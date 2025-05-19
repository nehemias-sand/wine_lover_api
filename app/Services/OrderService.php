<?php

namespace App\Services;

use App\Jobs\SendOrderStatusMail;
use App\Repositories\AddressRepositoryInterface;
use App\Repositories\CardTokenRepositoryInterface;
use App\Repositories\CashbackHistoryRepositoryInterface;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Repositories\OrderItemRepositoryInterface;
use App\Repositories\OrderPaymentStatusRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ProductPresentationRepositoryInterface;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderService
{
    public function __construct(
        private PaymentService $paymentService,
        private AddressRepositoryInterface $addressRepositoryInterface,
        private OrderRepositoryInterface $orderRepositoryInterface,
        private OrderItemRepositoryInterface $orderItemRepositoryInterface,
        private OrderPaymentStatusRepositoryInterface $orderPaymentStatusRepository,
        private ProductPresentationRepositoryInterface $productPresentationPlanRepositoryInterface,
        private ClientMembershipPlanRepositoryInterface $clientMembershipPlanRepositoryInterface,
        private CashbackHistoryRepositoryInterface $cashbackHistoryRepositoryInterface,
        private CardTokenRepositoryInterface $cardTokenRepository,
    ) {}

    public function index(array $pagination, array $filter)
    {
        return $this->orderRepositoryInterface->index($pagination, $filter);
    }

    public function show($id)
    {
        return $this->orderRepositoryInterface->show($id);
    }

    public function store(array $data)
    {
        $client = auth()->user()->client;
        $clientId = $client->id;
        $addressId = $data['address_id'];

        $address = $this->addressRepositoryInterface->show($addressId);
        $cardToken = $this->cardTokenRepository->show($data['card_token_id']);

        if (
            $address->client_id !== $clientId ||
            $cardToken->client_id !== $clientId ||
            $client->currentMembershipPlan() === null
        ) {
            throw new HttpException(403);
        }

        $order = $this->orderRepositoryInterface->store([
            'code' => (string) Str::uuid(),
            'subtotal' => 0,
            'total_discount' => 0,
            'total' => 0,
            'cashback_generated' => 0,
            'client_id' => $clientId,
            'address_id' => $addressId,
            'order_status_id' => 1, // Procesando Orden
        ]);

        $subtotal = 0;
        $totalDiscount = 0;

        foreach ($data['products'] as $productData) {
            $productPresentation = $this->productPresentationPlanRepositoryInterface
                ->show([
                    'product_id' => $productData['product_id'],
                    'presentation_id' => $productData['presentation_id']
                ]);

            if ($productPresentation->stock < $productData['amount']) {
                throw new BadRequestHttpException('Sin stock');
            }

            $unitPrice = $productPresentation->unit_price;
            $discount = 0;

            $subtotalItem = ($unitPrice * $productData['amount']) - $discount;
            $subtotalCashback = $this->clientMembershipPlanRepositoryInterface->calculateCashback($clientId, $subtotalItem);

            $this->orderItemRepositoryInterface->store([
                'order_id' => $order->id,
                'product_id' => $productData['product_id'],
                'presentation_id' => $productData['presentation_id'],
                'amount' => $productData['amount'],
                'unit_price' => $unitPrice,
                'discount' => $discount,
                'subtotal_item' => $subtotalItem,
                'subtotal_cashback' => $subtotalCashback,
            ]);

            $productPresentation->stock -= $productData['amount'];
            $productPresentation->save();

            $subtotal += $unitPrice * $productData['amount'];
            $totalDiscount += $discount;
        }

        $total = $subtotal - $totalDiscount;
        $cashbackGenerated = $this->clientMembershipPlanRepositoryInterface->calculateCashback($clientId, $total);

        $order->update([
            'subtotal' => $subtotal,
            'total_discount' => $totalDiscount,
            'total' => $total,
            'cashback_generated' => $cashbackGenerated,
        ]);

        $fullOrder = $order->fresh('items');

        $products = $fullOrder->items
            ->map(function ($item) {
                $images = $item->product->images;
                $firstImage = $images[0]->url_image;

                return [
                    'name' => $item->product->name,
                    'amount' => $item->amount,
                    'unit_price' => $item->unit_price,
                    'subtotal_item' => $item->subtotal_item,
                    'image_path' => $firstImage,
                ];
            })
            ->toArray();

        if ($data['payment_method_id'] === 1) { // Tarjeta

            $orderPaymentStatus = $this->orderPaymentStatusRepository->store([
                'order_id' => $fullOrder->id,
                'payment_method_id' => $data['payment_method_id'],
                'payment_status_id' => 1, // Pendiente
                'card_token_id' => $data['card_token_id'],
                'amount_paid' => $total,
                'isProd' => env('APP_ENV') === 'prod',
            ]);

            $this->cashbackHistoryRepositoryInterface->store([
                'amount' => $fullOrder->cashback_generated,
                'transaction_code' => $fullOrder->code,
                'type' => 'Order',
                'client_id' => $fullOrder->client_id,
            ]);

            $client = $fullOrder->client;
            $client->current_cashback += $fullOrder->cashback_generated;
            $client->save();

            $payload  = [
                'cardToken' => $cardToken->token,
                'monto' => $fullOrder->total,
                'configuracion' => [
                    'urlWebhook' => env('WEBHOOK_URL'),
                    'notificarTransaccionCliente' => true
                ],
                'nombre' => $fullOrder->client->names,
                'apellido' => $fullOrder->client->surnames,
                'email' => $fullOrder->client->user->email,
                'ciudad' =>  $fullOrder->address->district->name,
                'direccion' => [
                    'street' => $fullOrder->address->street,
                    'number' => $fullOrder->address->number,
                    'neighborhood' => $fullOrder->address->neighborhood,
                    'reference' => $fullOrder->address->reference,
                    'district' => $fullOrder->address->district->name ?? null,
                ],
                'telefono' => $fullOrder->client->phone,
                'datosAdicionales' => [
                    'transactionType' => 'ORDER',
                    'orderId' => $orderPaymentStatus->order_id,
                    'paymentMethodId' => $orderPaymentStatus->payment_method_id,
                    'paymentStatusId' => $orderPaymentStatus->payment_status_id,
                    'orderCode' => $fullOrder->code,
                    'orderStatus' => $fullOrder->orderStatus->name,
                    'orderDate' => $fullOrder->created_at,
                    'products' => $products,
                    'subtotal' => $fullOrder->subtotal,
                ],
            ];

            $paymentResponse = $this->paymentService->executePurchaseTransaction($payload);
            $fullOrder->transaction_id = $paymentResponse['transaction_id'];

        } else if ($data['payment_method_id'] === 2) { // Cashback

            $currentCashback = $client->current_cashback;

            if ($currentCashback < $fullOrder->total) {
                throw new BadRequestHttpException('Cashback insuficiente');
            }

            $client = $fullOrder->client;
            $client->current_cashback -= $fullOrder->total;
            $client->save();

            $this->cashbackHistoryRepositoryInterface->store([
                'amount' => $fullOrder->total * -1,
                'transaction_code' => $fullOrder->code,
                'type' => 'Order',
                'client_id' => $fullOrder->client_id,
            ]);

            $fullOrder->update([
                'cashback_generated' => 0.00,
            ]);

            $orderPaymentStatus = $this->orderPaymentStatusRepository->store([
                'order_id' => $fullOrder->id,
                'payment_method_id' => $data['payment_method_id'],
                'payment_status_id' => 3, // Completado
                'amount_paid' => $total,
                'isProd' => env('APP_ENV') === 'prod',
            ]);

            $payload = [
                'nombre' => $fullOrder->client->names,
                'apellido' => $fullOrder->client->surnames,
                'email' => $fullOrder->client->user->email,
                'telefono' => $fullOrder->client->phone,
                'monto' => $fullOrder->total,
                'direccion' => [
                    'street' => $fullOrder->address->street,
                    'number' => $fullOrder->address->number,
                    'neighborhood' => $fullOrder->address->neighborhood,
                    'reference' => $fullOrder->address->reference,
                    'district' => $fullOrder->address->district->name ?? null,
                ],
                'datosAdicionales' => [
                    'products' => $products,
                    'subtotal' => $fullOrder->subtotal,
                ],
            ];

            $this->paymentService->handleCashbackPayment($payload);

        } else {
            throw new BadRequestHttpException('Metodo de pago invalido');
        }

        return $fullOrder;
    }

    public function updateStatus($id, $orderStatusId)
    {
        $order = $this->orderRepositoryInterface->update($id, [
            'order_status_id' => $orderStatusId,
        ]);
        if (!$order) return null;

        $client = $order->client;

        $receiver = $client->user->email;
        $dataOrderStatusEmail = [
            'client_name' => $client->getFullNameAttribute(),
            'order_status' => $order->orderStatus->name,
            'code' => $order->code,
            'order_date' => $order->created_at,
        ];

        SendOrderStatusMail::dispatch($receiver, $dataOrderStatusEmail);
    }
}

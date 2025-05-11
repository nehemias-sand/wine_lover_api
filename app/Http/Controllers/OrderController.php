<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Mail\OrderDetailMail;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    public function createOrder(CreateOrderRequest $request)
    {
        DB::beginTransaction();

        try {
            $order = $this->orderService->store($request->validated());

            $fullOrder = Order::with([
                'orderItems.product.images',
                'address.district',
            ])->findOrFail($order->id);

            $products = $fullOrder->orderItems->map(function ($item) {
                $images = $item->product->images;
                $firstImage = $images[0]->url_image ?? 'default.jpg';

                return [
                    'name' => $item->product->name,
                    'amount' => $item->amount,
                    'unit_price' => $item->unit_price,
                    'subtotal_item' => $item->subtotal_item,
                    'image_path' => $firstImage,
                ];
            })->toArray();

            $clientFullName = $fullOrder->client->full_name;

            $dataEmail = [
                'client_name' => $clientFullName,
                'client_phone' => $fullOrder->client->phone,
                'subtotal' => $fullOrder->subtotal,
                'total' => $fullOrder->total,
                'address' => [
                    'street' => $fullOrder->address->street,
                    'number' => $fullOrder->address->number,
                    'neighborhood' => $fullOrder->address->neighborhood,
                    'reference' => $fullOrder->address->reference,
                    'district' => $fullOrder->address->district->name ?? null,
                ],
                'products' => $products,
            ];

            $userEmail = $fullOrder->address->client->user->email;

            Mail::to($userEmail)
                ->send(new OrderDetailMail(
                    $dataEmail
                ));

            DB::commit();
            return ApiResponseClass::sendResponse([
                'order' => $order,
            ], 'Order created successfully.', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}

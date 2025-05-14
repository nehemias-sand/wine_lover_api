<?php

namespace App\Services;

use App\Jobs\ProcessPaymentWebhook;
use App\Jobs\SendOrderDetailMail;
use App\Jobs\SendOrderStatusMail;
use App\Repositories\ClientMembershipPaymentStatusRepositoryInterface;
use App\Repositories\OrderPaymentStatusRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentService
{
    public function __construct(
        private ClientMembershipPaymentStatusRepositoryInterface $clientMembershipPaymentStatusRepository,
        private OrderPaymentStatusRepositoryInterface $orderPaymentStatusRepository,
    ) {}

    public function executeMembershipTansaction(array $payload)
    {
        $transactionId = (string) Str::uuid();

        $paymentStatusIds = Arr::only(
            $payload['datosAdicionales'],
            ['clientMembershipPlanId', 'paymentMethodId', 'paymentStatusId']
        );

        $clientMembershipPaymentStatus = $this->clientMembershipPaymentStatusRepository
            ->show($paymentStatusIds);

        if (!$clientMembershipPaymentStatus) return null;

        $newClientMembershipPaymentStatus = $clientMembershipPaymentStatus->replicate()->toArray();
        $newClientMembershipPaymentStatus['transaction_id'] = $transactionId;
        $newClientMembershipPaymentStatus['payment_status_id'] = 2; // Procesando

        $payload['datosAdicionales']['paymentStatusId'] = 2; // Procesando

        $this->clientMembershipPaymentStatusRepository->store($newClientMembershipPaymentStatus);
        $this->processPaymentWebhook($payload);

        return [
            'transaction_id' => $transactionId,
            'monto' => $payload['monto'],
        ];
    }

    public function executePurchaseTransaction(array $payload)
    {
        $transactionId = (string) Str::uuid();

        $paymentStatusIds = Arr::only(
            $payload['datosAdicionales'],
            ['orderId', 'paymentMethodId', 'paymentStatusId']
        );

        $orderPaymentStatus = $this->orderPaymentStatusRepository
            ->show($paymentStatusIds);

        if (!$orderPaymentStatus) return null;

        $newOrderPaymentStatus = $orderPaymentStatus->replicate()->toArray();
        $newOrderPaymentStatus['transaction_id'] = $transactionId;
        $newOrderPaymentStatus['payment_status_id'] = 2; // Procesando

        $payload['datosAdicionales']['paymentStatusId'] = 2; // Procesando

        $this->orderPaymentStatusRepository->store($newOrderPaymentStatus);
        $this->notifyOrderStatus($payload);
        $this->processPaymentWebhook($payload);

        return [
            'transaction_id' => $transactionId,
            'monto' => $payload['monto'],
        ];
    }

    public function handlePaymentWebhook(array $data)
    {
        $transactionType = $data['datosAdicionales']['transactionType'];

        if ($transactionType === 'MEMBERSHIP') {

            $paymentStatusIds = Arr::only(
                $data['datosAdicionales'],
                ['clientMembershipPlanId', 'paymentMethodId', 'paymentStatusId']
            );

            $clientMembershipPaymentStatus = $this->clientMembershipPaymentStatusRepository
                ->show($paymentStatusIds);

            if (!$clientMembershipPaymentStatus) return null;

            $now = Carbon::now()->startOfDay();
            $months = $clientMembershipPaymentStatus->clientPlan->plan->months;

            $clientPlan = $clientMembershipPaymentStatus->clientPlan;
            $clientPlan->end_date = $now->addMonths($months);
            $clientPlan->active = true;
            $clientPlan->save();

            $newClientMembershipPaymentStatus = $clientMembershipPaymentStatus->replicate()->toArray();
            $newClientMembershipPaymentStatus['payment_status_id'] = 3; // Completado

            $this->clientMembershipPaymentStatusRepository->store($newClientMembershipPaymentStatus);
        } else if ($transactionType === 'ORDER') {

            $paymentStatusIds = Arr::only(
                $data['datosAdicionales'],
                ['orderId', 'paymentMethodId', 'paymentStatusId']
            );

            $orderPaymentStatus = $this->orderPaymentStatusRepository
                ->show($paymentStatusIds);

            if (!$orderPaymentStatus) return null;

            $newOrderPaymentStatus = $orderPaymentStatus->replicate()->toArray();
            $newOrderPaymentStatus['payment_status_id'] = 3; // Completado

            $this->orderPaymentStatusRepository->store($newOrderPaymentStatus);
            $this->confirmSuccessfulPaymentOrder($data);
        } else {
            Log::warning('Transaction type not valid', $data);
        }
    }

    public function handleCashbackPayment(array $payload)
    {
        $this->confirmSuccessfulPaymentOrder($payload);
    }

    private function processPaymentWebhook(array $payload)
    {
        $jsonBody = json_encode($payload);
        $secret = Config::get('services.webhook_payment.secret');

        // Firma tipo HMAC-SHA256
        $signature = hash_hmac('sha256', $jsonBody, $secret);

        // Webhook firmado
        ProcessPaymentWebhook::dispatch($payload, $signature);
    }

    private function confirmSuccessfulPaymentOrder(array $payload)
    {
        $dataEmail = [
            'client_name' => $payload['nombre'] . ' ' . $payload['apellido'],
            'client_phone' => $payload['telefono'],
            'subtotal' => $payload['datosAdicionales']['subtotal'],
            'total' => $payload['monto'],
            'address' => $payload['direccion'],
            'products' => $payload['datosAdicionales']['products'],
        ];

        SendOrderDetailMail::dispatch($payload['email'], $dataEmail);
    }

    private function notifyOrderStatus(array $payload)
    {
        $dataOrderStatusEmail = [
            'order_date' => $payload['datosAdicionales']['orderDate'],
            'code' => $payload['datosAdicionales']['orderCode'],
            'client_name' => $payload['nombre'] . ' ' . $payload['apellido'],
            'order_status' => $payload['datosAdicionales']['orderStatus'],
        ];

        SendOrderStatusMail::dispatch($payload['email'], $dataOrderStatusEmail);
    }
}

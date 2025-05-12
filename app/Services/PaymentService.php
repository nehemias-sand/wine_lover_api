<?php

namespace App\Services;

use App\Jobs\ProcessPaymentWebhook;
use App\Repositories\ClientMembershipPaymentStatusRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentService
{
    public function __construct(
        private ClientMembershipPaymentStatusRepositoryInterface $clientMembershipPaymentStatusRepository,
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

        $jsonBody = json_encode($payload);
        $secret = Config::get('services.webhook_payment.secret');

        // Firma tipo HMAC-SHA256
        $signature = hash_hmac('sha256', $jsonBody, $secret);

        // Webhook firmado
        ProcessPaymentWebhook::dispatch($payload, $signature);

        return [
            'idTransaccion' => $transactionId,
            'monto' => $payload['monto'],
        ];
    }

    public function executePurchaseTransaction(array $payload)
    {
        $transactionId = (string) Str::uuid();

        return [
            'idTransaccion' => $transactionId,
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
        } else {
            Log::warning('Transaction type not valid', $data);
        }
    }
}

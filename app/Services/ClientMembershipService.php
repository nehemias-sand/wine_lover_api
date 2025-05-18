<?php

namespace App\Services;

use App\Models\ClientMembershipPlan;
use App\Repositories\AddressRepositoryInterface;
use App\Repositories\CardTokenRepositoryInterface;
use App\Repositories\CashbackHistoryRepositoryInterface;
use App\Repositories\ClientMembershipPaymentStatusRepositoryInterface;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Repositories\MembershipPlanRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Double;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ClientMembershipService
{
    public function __construct(
        private PaymentService $paymentService,
        private AddressRepositoryInterface $addressRepositoryInterface,
        private CardTokenRepositoryInterface $cardTokenRepository,
        private MembershipPlanRepositoryInterface $membershipPlanRepositoryInterface,
        private ClientMembershipPlanRepositoryInterface $clientMembershipPlanRepositoryInterface,
        private ClientMembershipPaymentStatusRepositoryInterface $clientMembershipPaymentStatusRepository,
        private CashbackHistoryRepositoryInterface $cashbackHistoryRepositoryInterface,
    ) {}

    public function acquire(array $data, ?ClientMembershipPlan $currentMembershipPlan)
    {
        $identifiers = Arr::only($data, ['membership_id', 'plan_id']);
        $payment = Arr::only($data, ['card', 'payment_method_id']);

        $membershipPlan = $this->membershipPlanRepositoryInterface->show($identifiers);
        if (!$membershipPlan) return null;

        $clientMembershipPlan = $this->clientMembershipPlanRepositoryInterface
            ->store([
                'code' => (string) Str::uuid(),
                'price' => $membershipPlan->price,
                'cashback_percentage' => $membershipPlan->cashback_percentage,
                'automatic_renewal' => $data['automatic_renewal'],
                'client_id' => $data['client_id'],
                'membership_id' => $identifiers['membership_id'],
                'plan_id' => $identifiers['plan_id'],
            ]);

        $clientMembershipPaymentStatus = $this->clientMembershipPaymentStatusRepository
            ->store([
                'client_membership_plan_id' => $clientMembershipPlan->id,
                'payment_method_id' => $payment['payment_method_id'],
                'payment_status_id' => 1, // Pendiente
                'amount_paid' => $clientMembershipPlan->price,
                'card_token_id' => $data['card_token_id'],
                'billing_address_id' => $data['address_id'],
                'isProd' => env('APP_ENV') === 'prod',
            ]);

        $refundAmount = $this->handleCurrentMembershipPlan(
            $currentMembershipPlan,
            $clientMembershipPlan
        );

        $address = $this->addressRepositoryInterface->show($data['address_id']);
        $cardToken = $this->cardTokenRepository->show($data['card_token_id']);

        if (
            $address->client_id !== $data['client_id'] ||
            $cardToken->client_id !== $data['client_id']
        ) {
            throw new HttpException(403);
        }

        $payload  = [
            'cardToken' => $cardToken->token,
            'monto' => $clientMembershipPlan->price,
            'configuracion' => [
                'urlWebhook' => env('WEBHOOK_URL'),
                'notificarTransaccionCliente' => true
            ],
            'nombre' => $clientMembershipPlan->client->names,
            'apellido' => $clientMembershipPlan->client->surnames,
            'email' => $clientMembershipPlan->client->user->email,
            'ciudad' => $address->district->name,
            'direccion' => $address->neighborhood . ' ' . $address->street . ' #' . $address->number,
            'telefono' => $clientMembershipPlan->client->phone,
            'datosAdicionales' => [
                'transactionType' => 'MEMBERSHIP',
                'clientMembershipPlanId' => $clientMembershipPaymentStatus->client_membership_plan_id,
                'paymentMethodId' => $clientMembershipPaymentStatus->payment_method_id,
                'paymentStatusId' => $clientMembershipPaymentStatus->payment_status_id,
                'clientMembershipPlanName' => $clientMembershipPlan->membership->name . '/' . $clientMembershipPlan->plan->description,
                'clientMembershipPlanPercentage' => $clientMembershipPlan->cashback_percentage,
                'card' => [
                    'maskedNumber' => $cardToken->masked_number,
                    'brand' => $cardToken->brand,
                ],
                'refundAmount' => $refundAmount,
            ],
        ];

        $paymentResponse = $this->paymentService->executeMembershipTansaction($payload);

        return $paymentResponse;
    }

    private function handleCurrentMembershipPlan(
        ?ClientMembershipPlan $currentClientMembershipPlan,
        ClientMembershipPlan $newClientMembershipPlan,
    ): float {

        $refundAmount = 0.0;

        if ($currentClientMembershipPlan) {
            if (
                !($newClientMembershipPlan->membership_id > $currentClientMembershipPlan->membership_id)
            ) {
                throw new BadRequestHttpException('Solo se permiten renovaciones anticipadas a una membresia superior');
            }

            $now = Carbon::now();
            $startDate = Carbon::parse($currentClientMembershipPlan->created_at);
            $endDate = Carbon::parse($currentClientMembershipPlan->end_date);
            $totalPrice = $currentClientMembershipPlan->price;

            $totalDays = $startDate->diffInDays($endDate);
            $remainingDays = $now->lt($endDate) ? $now->diffInDays($endDate) : 0;

            $refundAmount = $totalDays > 0
                ? round(($remainingDays / $totalDays) * $totalPrice, 2)
                : 0.00;

            $newClientMembershipPlan->refund_amount = $refundAmount;
            $newClientMembershipPlan->save();

            $this->cashbackHistoryRepositoryInterface->store([
                'amount' => $refundAmount,
                'transaction_code' => $newClientMembershipPlan->code,
                'type' => 'Membership refund',
                'client_id' => $newClientMembershipPlan->client_id,
            ]);

            $client = $newClientMembershipPlan->client;
            $client->current_cashback += $refundAmount;
            $client->save();

            $currentClientMembershipPlan->active = false;
            $currentClientMembershipPlan->save();
        }

        return $refundAmount;
    }
}

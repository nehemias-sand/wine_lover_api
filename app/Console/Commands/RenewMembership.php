<?php

namespace App\Console\Commands;

use App\Repositories\ClientMembershipPaymentStatusRepositoryInterface;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Services\PaymentService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RenewMembership extends Command
{
    public function __construct(
        private ClientMembershipPlanRepositoryInterface $clientMembershipPlanRepository,
        private ClientMembershipPaymentStatusRepositoryInterface $clientMembershipPaymentStatusRepository,
        private PaymentService $paymentService
    ) {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renew:membership';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew Client Membership';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now()->startOfDay();
        Log::info($now);
        $clientMembershipPlans = $this->clientMembershipPlanRepository
            ->index(['paginate' => false], ['end_date' => $now]);

        $clientMembershipPlans->each(
            function ($clientMembershipPlan) {
                $firstPaymentStatus = $clientMembershipPlan->paymentStatuses->first();
                $cardToken = $firstPaymentStatus->cardToken;
                $billingAddress = $firstPaymentStatus->billingAddress;

                $clientMembreshipPlanCopy = $clientMembershipPlan
                    ->replicate()
                    ->toArray();

                $clientMembreshipPlanCopy['end_date'] = null;
                $clientMembreshipPlanCopy['refund_amount'] = null;
                $clientMembreshipPlanCopy['active'] = false;

                $newClientMembreshipPlan = $this->clientMembershipPlanRepository
                    ->store($clientMembreshipPlanCopy);

                $clientMembreshipPaymentStatusCopy = $firstPaymentStatus->replicate()->toArray();

                $clientMembreshipPaymentStatusCopy['client_membership_plan_id'] = $newClientMembreshipPlan->id;
                $clientMembreshipPaymentStatusCopy['payment_status_id'] = 1; // Pendiente

                $newClientMembershipPaymentStatus = $this->clientMembershipPaymentStatusRepository
                    ->store($clientMembreshipPaymentStatusCopy);

                $payload  = [
                    'cardToken' => $cardToken->token,
                    'monto' => $newClientMembreshipPlan->price,
                    'configuracion' => [
                        'urlWebhook' => env('WEBHOOK_URL'),
                        'notificarTransaccionCliente' => true
                    ],
                    'nombre' => $newClientMembreshipPlan->client->names,
                    'apellido' => $newClientMembreshipPlan->client->surnames,
                    'email' => $newClientMembreshipPlan->client->user->email,
                    'ciudad' => $billingAddress->district->name,
                    'direccion' => $billingAddress->neighborhood . ' ' . $billingAddress->street . ' #' . $billingAddress->number,
                    'telefono' => $newClientMembreshipPlan->client->phone,
                    'datosAdicionales' => [
                        'transactionType' => 'MEMBERSHIP',
                        'clientMembershipPlanId' => $newClientMembershipPaymentStatus->client_membership_plan_id,
                        'paymentMethodId' => $newClientMembershipPaymentStatus->payment_method_id,
                        'paymentStatusId' => $newClientMembershipPaymentStatus->payment_status_id,
                    ],
                ];

                $this->paymentService->executeMembershipTansaction($payload);
            }
        );
    }
}

<?php

namespace App\Repositories\Implementations;

use App\Models\ClientMembershipPaymentStatus;
use App\Repositories\ClientMembershipPaymentStatusRepositoryInterface;

class ClientMembershipPaymentStatusPostgreRepository implements ClientMembershipPaymentStatusRepositoryInterface
{
    public function store(array $data)
    {
        return ClientMembershipPaymentStatus::create($data);
    }

    public function show($ids)
    {
        $membershipPaymentStatus = ClientMembershipPaymentStatus::query()
            ->where('client_membership_plan_id', '=', $ids['clientMembershipPlanId'])
            ->where('payment_method_id', '=', $ids['paymentMethodId'])
            ->where('payment_status_id', '=', $ids['paymentStatusId'])
            ->first();

        if (!$membershipPaymentStatus) return null;

        return $membershipPaymentStatus;
    }
}

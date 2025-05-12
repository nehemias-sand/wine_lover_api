<?php

namespace App\Repositories\Implementations;

use App\Models\ClientMembershipPlan;
use App\Models\MembershipPlan;
use App\Repositories\ClientMembershipPlanRepositoryInterface;

class ClientMembershipPlanPostgresRepository implements ClientMembershipPlanRepositoryInterface
{
    public function index(array $pagination, array $filter) {}

    public function show($id)
    {
        $clientMembership = ClientMembershipPlan::find($id);

        if (!$clientMembership) return null;

        return $clientMembership;
    }

    public function store(array $data)
    {
        return ClientMembershipPlan::create($data);
    }

    public function update($id, $data)
    {
        $clientMembership = ClientMembershipPlan::find($id);

        if (!$clientMembership) return null;

        $clientMembership->update($data);

        return $clientMembership;
    }

    public function delete($id) 
    {
        $clientMembership = $this->show($id);

        if (!$clientMembership) return null;

        $clientMembership->delete();

        return $clientMembership;
    }

    public function calculateCashback(int $clientId, float $total): float
    {
        $clientMembershipPlan = ClientMembershipPlan::where('client_id', $clientId)
            ->whereNull('deleted_at')
            ->where('active', '=', true)
            ->orderBy('end_date', 'desc')
            ->first();

        if (!$clientMembershipPlan) {
            return 0;
        }

        $membershipPlan = MembershipPlan::where('membership_id', $clientMembershipPlan->membership_id)
            ->where('plan_id', $clientMembershipPlan->plan_id)
            ->first();

        if (!$membershipPlan) {
            return 0;
        }

        $percentage = $membershipPlan->cashback_percentage;

        return round($total * ($percentage / 100), 2);
    }
}

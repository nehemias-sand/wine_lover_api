<?php

namespace App\Repositories\Implementations;

use App\Models\MembershipPlan;
use App\Repositories\MembershipPlanRepositoryInterface;

class MembershipPlanPostgresRepository implements MembershipPlanRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $membershipPlans = MembershipPlan::query();

        if (isset($filter['membership_id'])) {
            $membershipPlans->where('membership_id', '=', $filter['membership_id']);
        }

        if ($pagination['paginate']  === 'true') {
            return $membershipPlans->paginate($pagination['per_page']);
        }

        return $membershipPlans->get();
    }

    public function show($ids)
    {
        $membershipPlan = MembershipPlan::query()
            ->where('membership_id', '=', $ids['membership_id'])
            ->where('plan_id', '=', $ids['plan_id'])
            ->first();

        if (!$membershipPlan) return null;

        return $membershipPlan;
    }

    public function store(array $data)
    {
        return MembershipPlan::create($data);
    }

    public function update($ids, $data)
    {
        MembershipPlan::query()
            ->where('membership_id', '=', $ids['membership_id'])
            ->where('plan_id', '=', $ids['plan_id'])
            ->update($data);

        return $this->show($ids);
    }

    public function delete($ids)
    {
        $membershipPlan = $this->show($ids);
        if (!$membershipPlan) return null;

        MembershipPlan::query()
            ->where('membership_id', '=', $ids['membership_id'])
            ->where('plan_id', '=', $ids['plan_id'])
            ->delete();

        return $membershipPlan;
    }
}

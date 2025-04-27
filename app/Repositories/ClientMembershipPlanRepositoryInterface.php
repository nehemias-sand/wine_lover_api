<?php

namespace App\Repositories;

interface ClientMembershipPlanRepositoryInterface extends RepositoryInterface
{
    public function calculateCashback(int $clientId, float $total): float;
}

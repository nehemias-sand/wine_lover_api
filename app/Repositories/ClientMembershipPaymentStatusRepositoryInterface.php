<?php

namespace App\Repositories;

interface ClientMembershipPaymentStatusRepositoryInterface
{
    public function store(array $data);
    public function show(array $ids);
}

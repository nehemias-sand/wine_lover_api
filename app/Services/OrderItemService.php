<?php

namespace App\Services;

use App\Repositories\OrderItemRepositoryInterface;

class OrderItemService
{
    public function __construct(
        private OrderItemRepositoryInterface $orderItemRepositoryInterface,
    ) {}

    public function store(array $data)
    {
        return $this->orderItemRepositoryInterface->store($data);
    }
}
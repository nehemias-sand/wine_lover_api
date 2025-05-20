<?php

namespace App\Repositories\Implementations;

use App\Models\OrderStatus;
use App\Repositories\OrderStatusRepositoryInterface;

class OrderStatusPostgresRepository implements OrderStatusRepositoryInterface
{
    public function index()
    {
        return OrderStatus::all();
    }
}

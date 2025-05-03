<?php

namespace App\Repositories\Implementations;

use App\Models\PaymentStatus;
use App\Repositories\PaymentStatusRepositoryInterface;

class PaymentStatusPostgresRepository implements PaymentStatusRepositoryInterface
{
    public function index()
    {
        return PaymentStatus::all();
    }
}

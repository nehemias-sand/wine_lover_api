<?php

namespace App\Repositories\Implementations;

use App\Models\PaymentMethod;
use App\Repositories\PaymentMethodRepositoryInterface;

class PaymentMethodPostgresRepository implements PaymentMethodRepositoryInterface
{
    public function index()
    {
        return PaymentMethod::all();
    }
}

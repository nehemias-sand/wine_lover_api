<?php

namespace App\Repositories\Implementations;

use App\Models\OrderPaymentStatus;
use App\Repositories\OrderPaymentStatusRepositoryInterface;

class OrderPaymentStatusPostgresRepository implements OrderPaymentStatusRepositoryInterface
{
    public function index(array $pagination, array $filter) {}

    public function show($id)
    {
        $orderPayment = OrderPaymentStatus::find($id);

        if (!$orderPayment) return null;

        return $orderPayment;
    }

    public function store(array $data)
    {
        return OrderPaymentStatus::create($data);
    }

    public function update($id, $data)
    {
        $orderPayment = OrderPaymentStatus::find($id);

        if (!$orderPayment) return null;

        $orderPayment->update($data);

        return $orderPayment;
    }

    public function delete($id)
    {
        $orderPayment = $this->show($id);

        if (!$orderPayment) return null;

        $orderPayment->delete();

        return $orderPayment;
    }
}

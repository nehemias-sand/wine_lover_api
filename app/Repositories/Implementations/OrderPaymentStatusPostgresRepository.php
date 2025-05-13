<?php

namespace App\Repositories\Implementations;

use App\Models\OrderPaymentStatus;
use App\Repositories\OrderPaymentStatusRepositoryInterface;

class OrderPaymentStatusPostgresRepository implements OrderPaymentStatusRepositoryInterface
{
    public function index(array $pagination, array $filter) {}

    public function show($ids)
    {
        $orderPayment = OrderPaymentStatus::query()
            ->where('order_id', '=', $ids['orderId'])
            ->where('payment_method_id', '=', $ids['paymentMethodId'])
            ->where('payment_status_id', '=', $ids['paymentStatusId'])
            ->first();

        if (!$orderPayment) return null;

        return $orderPayment;
    }

    public function store(array $data)
    {
        return OrderPaymentStatus::create($data);
    }

    public function update($ids, $data)
    {
        $orderPayment = $this->show($ids);

        if (!$orderPayment) return null;

        $orderPayment->update($data);

        return $orderPayment;
    }

    public function delete($ids)
    {
        $orderPayment = $this->show($ids);

        if (!$orderPayment) return null;

        $orderPayment->delete();

        return $orderPayment;
    }
}

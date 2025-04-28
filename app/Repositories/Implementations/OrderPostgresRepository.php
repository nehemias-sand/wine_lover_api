<?php

namespace App\Repositories\Implementations;

use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;

class OrderPostgresRepository implements OrderRepositoryInterface
{
    public function index(array $pagination, array $filter) {}

    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) return null;

        return $order;
    }

    public function store(array $data)
    {
        return Order::create($data);
    }

    public function update($id, $data)
    {
        $order = Order::find($id);

        if (!$order) return null;

        $order->update($data);

        return $order;
    }

    public function delete($id)
    {
        $order = $this->show($id);

        if (!$order) return null;

        $order->delete();

        return $order;
    }
}

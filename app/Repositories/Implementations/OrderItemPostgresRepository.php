<?php

namespace App\Repositories\Implementations;

use App\Models\OrderItem;
use App\Repositories\OrderItemRepositoryInterface;

class OrderItemPostgresRepository implements OrderItemRepositoryInterface
{
    public function index(array $pagination, array $filter) {}

    public function show($id)
    {
        $orderItem = OrderItem::with([
            'product',
            'presentation',
        ])->find($id);

        if (!$orderItem) return null;

        return $orderItem;
    }

    public function store(array $data)
    {
        return OrderItem::create($data)->load([
            'product',
            'presentation',
        ]);
    }

    public function update($id, $data)
    {
        $orderItem = $this->show($id);

        if (!$orderItem) return null;

        $orderItem->update($data);

        return $orderItem;
    }

    public function delete($id)
    {
        $orderItem = $this->show($id);

        if (!$orderItem) return null;

        $orderItem->delete();

        return $orderItem;
    }
}

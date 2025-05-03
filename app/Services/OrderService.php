<?php

namespace App\Services;

use App\Models\ProductPresentation;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Repositories\OrderItemRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;

class OrderService
{
    public function __construct(
        private OrderRepositoryInterface $orderRepositoryInterface,
        private OrderItemRepositoryInterface $orderItemRepositoryInterface,
        private ClientMembershipPlanRepositoryInterface $clientMembershipPlanRepositoryInterface,
    ) {}

    public function store(array $data)
    {
        $user = auth()->user();

        $clientId = $user->client->id;

        $order = $this->orderRepositoryInterface->store([
            'subtotal' => 0,
            'total_discount' => 0,
            'total' => 0,
            'cashback_generated' => 0,
            'client_id' => $clientId,
            'order_status_id' => 1,
        ]);

        $subtotal = 0;
        $totalDiscount = 0;

        foreach ($data['products'] as $productData) {
            $productPresentation = ProductPresentation::where('product_id', $productData['product_id'])
                ->where('presentation_id', $productData['presentation_id'])
                ->firstOrFail();

            $unitPrice = $productPresentation->unit_price;
            $discount = 0;

            $subtotalItem = ($unitPrice * $productData['amount']) - $discount;

            $this->orderItemRepositoryInterface->store([
                'order_id' => $order->id,
                'product_id' => $productData['product_id'],
                'presentation_id' => $productData['presentation_id'],
                'amount' => $productData['amount'],
                'unit_price' => $unitPrice,
                'discount' => $discount,
                'subtotal_item' => $subtotalItem,
            ]);

            $subtotal += $unitPrice * $productData['amount'];
            $totalDiscount += $discount;
        }

        $total = $subtotal - $totalDiscount;

        $cashbackGenerated = $this->clientMembershipPlanRepositoryInterface->calculateCashback($clientId, $total);

        $order->update([
            'subtotal' => $subtotal,
            'total_discount' => $totalDiscount,
            'total' => $total,
            'cashback_generated' => $cashbackGenerated,
        ]);

        return $order->fresh('items');
    }
}

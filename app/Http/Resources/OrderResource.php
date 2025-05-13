<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'subtotal' => $this->subtotal,
            'total_discount' => $this->total_discount,
            'total' => $this->total,
            'cashback_generated' => $this->cashback_generated,
            'address' => new AddressResource($this->address),
            'order_status' => $this->orderStatus->name,
            'transaction_id' => $this->transaction_id,
            'items' => $this->items->map(fn($item) => [
                'product' => new ProductResource($item->product),
                'presentation' => new PresentationResource($item->presentation),
                'amount' => $item->amount,
                'unit_price' => $item->unit_price,
                'discount' => $item->discount,
                'subtotal_item' => $item->subtotal_item,
            ])
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'subtotal' => $this->subtotal,
            'total_discount' => $this->total_discount,
            'total' => $this->total,
            'cashback_generated' => $this->cashback_generated,
            'address' => new AddressResource($this->address),
            'order_status' => $this->orderStatus->name,
            'items' => $this->items->map(fn($item) => [
                'product' => new ProductResource($item->product),
                'presentation' => new PresentationResource($item->presentation),
                'amount' => $item->amount,
                'unit_price' => $item->unit_price,
                'discount' => $item->discount,
                'subtotal_item' => $item->subtotal_item,
            ])
        ];
    }
}

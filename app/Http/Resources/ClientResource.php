<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'names' => $this->names,
            'surnames' => $this->surnames,
            'identity_number' => $this->identity_number,
            'birthday_date' => $this->birthday_date,
            'phone' => $this->phone,
            'addresses' => $this->addresses->map(fn($address) => new AddressResource($address)),
            'membership' => $this->currentMembershipPlan()?->membership->name,
            'current_cashback' => $this->current_cashback,
            'orders' => $this->orders->map(fn($order) => new OrderResource($order)),
            'cashback_history' => $this->cashbackHistory->map(fn($cashback) => new CashbackHistoryResource($cashback)),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'names' => $this->names,
            'surnames' => $this->surnames,
            'identity_number' => $this->identity_number,
            'birthday_date' => $this->birthday_date,
            'phone' => $this->phone,
            'addresses' => $this->addresses->map(fn($address) => new AddressResource($address)),
            'membership' => $this->currentMembershipPlan()?->membership->name,
            'current_cashback' => $this->current_cashback,
            'orders' => $this->orders->map(fn($order) => new OrderResource($order)),
            'cashback_history' => $this->cashbackHistory->map(fn($cashback) => new CashbackHistoryResource($cashback)),
        ];
    }
}

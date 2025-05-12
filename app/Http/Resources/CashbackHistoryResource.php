<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CashbackHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'amount' => $this->amount,
            'transaction_code' => $this->transaction_code,
            'type' => $this->type,
            'created_at' => $this->created_at,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'amount' => $this->amount,
            'transaction_code' => $this->transaction_code,
            'type' => $this->type,
            'created_at' => $this->created_at,
        ];
    }
}

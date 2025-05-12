<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardTokenResource extends JsonResource
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
            'token' => $this->token,
            'masked_number' => $this->masked_number,
            'brand' => $this->brand,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'token' => $this->token,
            'masked_number' => $this->masked_number,
            'brand' => $this->brand,
        ];
    }
}

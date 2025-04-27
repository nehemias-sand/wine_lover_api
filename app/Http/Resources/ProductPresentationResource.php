<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPresentationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product' => [
                'id' => $this->product->id,
                'name' => $this->product->name
            ],
            'presentation' => [
                'id' => $this->presentation->id,
                'amount' => $this->presentation->amount,
                'unit_measurement' => $this->presentation->unitMeasurement->abbreviation
            ],
            'stock' => $this->stock,
            'unit_price' => $this->unit_price,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'product' => [
                'id' => $this->product->id,
                'name' => $this->product->name
            ],
            'presentation' => [
                'id' => $this->presentation->id,
                'amount' => $this->presentation->amount,
                'unit_measurement' => $this->presentation->unitMeasurement->abbreviation
            ],
            'stock' => $this->stock,
            'unit_price' => $this->unit_price,
        ];
    }
}

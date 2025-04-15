<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresentationResource extends JsonResource
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
            'amount' => $this->amount,
            'unit_measurement' => [
                'id' => $this->unitMeasurement->id,
                'name' => $this->unitMeasurement->name,
                'abbreviation' => $this->unitMeasurement->abbreviation,
            ],
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'unit_measurement' => [
                'id' => $this->unitMeasurement->id,
                'name' => $this->unitMeasurement->name,
                'abbreviation' => $this->unitMeasurement->abbreviation,
            ],
        ];
    }
}

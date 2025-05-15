<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
            'category_product' => new CategoryProductResource($this->category),
            'quality_product' => new QualityProductResource($this->quality),
            'presentations' => $this->presentations->map(fn($productPresentation) => [
                'id' => $productPresentation->presentation_id,
                'amount' => $productPresentation->presentation->amount,
                'unit_measurement' => $productPresentation->presentation->unitMeasurement->abbreviation,
                'stock' => $productPresentation->stock,
                'unit_price' => $productPresentation->unit_price
            ]),
            'images' => $this->images->map(fn($image) => new ProductImageResource($image)),
            'manufacturer' => new ManufacturerResource($this->manufacturer),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
            'category_product' => new CategoryProductResource($this->category),
            'quality_product' => new QualityProductResource($this->quality),
            'presentations' => $this->presentations->map(fn($productPresentation) => [
                'id' => $productPresentation->presentation_id,
                'amount' => $productPresentation->presentation->amount,
                'unit_measurement' => $productPresentation->presentation->unitMeasurement->abbreviation,
                'stock' => $productPresentation->stock,
                'unit_price' => $productPresentation->unit_price
            ]),
            'images' => $this->images->map(fn($image) => new ProductImageResource($image)),
            'manufacturer' => new ManufacturerResource($this->manufacturer),
        ];
    }
}

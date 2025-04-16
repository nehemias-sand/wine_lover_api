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
            'category_product' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'description' => $this->category->description,
            ],
            'quality_product' => [
                'id' => $this->quality->id,
                'name' => $this->quality->name,
                'description' => $this->quality->description,
            ],
            'presentations' => $this->presentations->map(fn($productPresentation) => [
                'id' => $productPresentation->presentation_id,
                'amount' => $productPresentation->presentation->amount,
                'unit_measurement' => $productPresentation->presentation->unitMeasurement->abbreviation,
                'stock' => $productPresentation->stock,
                'unit_price' => $productPresentation->unit_price
            ]),
            'images' => $this->images->map(fn($image) => [
                'id' => $image->id,
                'url_image' => $image->url_image,
                'state' => $image->state
            ]),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
            'category_product' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'description' => $this->category->description,
            ],
            'quality_product' => [
                'id' => $this->quality->id,
                'name' => $this->quality->name,
                'description' => $this->quality->description,
            ],
            'presentations' => $this->presentations->map(fn($productPresentation) => [
                'id' => $productPresentation->presentation_id,
                'amount' => $productPresentation->presentation->amount,
                'unit_measurement' => $productPresentation->presentation->unitMeasurement->abbreviation,
                'stock' => $productPresentation->stock,
                'unit_price' => $productPresentation->unit_price
            ]),
            'images' => $this->images->map(fn($image) => [
                'id' => $image->id,
                'url_image' => $image->url_image,
                'state' => $image->state
            ]),
        ];
    }
}

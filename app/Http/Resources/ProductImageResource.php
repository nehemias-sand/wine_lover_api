<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
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
            'url_image' => $this->url_image,
            'state' => $this->state
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'url_image' => $this->url_image,
            'state' => $this->state
        ];
    }
}

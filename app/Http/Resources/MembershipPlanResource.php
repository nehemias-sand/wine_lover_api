<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MembershipPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'plan' => new PlanResource($this->plan),
            'price' => $this->price,
            'cashback_percentage' => $this->cashback_percentage
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'plan' => new PlanResource($this->plan),
            'price' => $this->price,
            'cashback_percentage' => $this->cashback_percentage
        ];
    }
}

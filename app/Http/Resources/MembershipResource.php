<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MembershipResource extends JsonResource
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
            'plans' => $this->plans->map(fn($plan) => new MembershipPlanResource($plan)),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'plans' => $this->plans->map(fn($plan) => new MembershipPlanResource($plan)),
        ];
    }
}

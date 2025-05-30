<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'municipalities' => $this->municipalities
                ->map(fn($municipality) => new MunicipalityResource($municipality)),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'municipalities' => $this->municipalities
                ->map(fn($municipality) => new MunicipalityResource($municipality)),
        ];
    }
}

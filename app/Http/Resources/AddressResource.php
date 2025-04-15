<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'neighborhood' => $this->neighborhood,
            'street' => $this->street,
            'number' => $this->number,
            'reference' => $this->reference,
            'district_id' => $this->district_id,
            'client_id' => $this->client_id,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'neighborhood' => $this->neighborhood,
            'street' => $this->street,
            'number' => $this->number,
            'reference' => $this->reference,
            'district_id' => $this->district_id,
            'client_id' => $this->client_id,
        ];
    }
}

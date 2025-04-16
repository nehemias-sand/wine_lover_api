<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'names' => $this->names,
            'surnames' => $this->surnames,
            'identity_number' => $this->identity_number,
            'birthday_date' => $this->birthday_date,
            'phone' => $this->phone,
            'user_id' => $this->user_id,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'names' => $this->names,
            'surnames' => $this->surnames,
            'identity_number' => $this->identity_number,
            'birthday_date' => $this->birthday_date,
            'phone' => $this->phone,
            'user_id' => $this->user_id,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $userPermissions = $this->permissions ?? collect();
        $profilePermissions = $this->profile?->permissions ?? collect();

        $allPermissions = $userPermissions
            ->merge($profilePermissions)
            ->map(fn($perm) => strtoupper($perm->name))
            ->unique();

        $data = [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'profile' => new ProfileResource($this->profile),
            'state' => $this->state,
            'permissions' => $allPermissions
        ];

        if ($this->profile->id === 2) {
            $data['client'] = new ClientResource($this->client);
        }

        if (isset($this->token)) {
            $data['token'] = $this->token;
        }

        return $data;
    }

    public function toJson($options = 0)
    {
        $userPermissions = $this->permissions ?? collect();
        $profilePermissions = $this->profile?->permissions ?? collect();

        $allPermissions = $userPermissions
            ->merge($profilePermissions)
            ->map(fn($perm) => strtoupper($perm->name))
            ->unique();

        $data = [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'profile' => $this->profile->name,
            'state' => $this->state,
            'permissions' => $allPermissions
        ];

        if ($this->profile->id === 2) {
            $data['client'] = new ClientResource($this->client);
        }

        return $data;
    }
}

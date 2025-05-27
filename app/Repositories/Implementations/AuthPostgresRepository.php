<?php

namespace App\Repositories\Implementations;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;

class AuthPostgresRepository implements AuthRepositoryInterface
{

    public function index(array $pagination, array $filter)
    {
        $users = User::query()
            ->with([
                'profile',
                'permissions',
                'profile.permissions'
            ]);

        if (isset($filter['email'])) {
            $users->where('email', 'like', '%' . $filter['email'] . '%');
        }

        if ($pagination['paginate'] === 'true') {
            return $users->paginate($pagination['per_page']);
        }
    }

    public function register(array $data)
    {
        return User::create($data)->load([
            'profile',
            'permissions',
            'profile.permissions'
        ]);
    }

    public function update(int $id, array $data)
    {
        $user = User::with([
            'profile',
            'permissions',
            'profile.permissions'
        ])->find($id);

        if (!$user) return null;

        $user->update($data);

        return $user;
    }

    public function changeState(int $id)
    {
        $user = User::with([
            'profile',
            'permissions',
            'profile.permissions'
        ])->find($id);

        if (!$user) return null;

        $state = !$user->state;

        $user->update(['state' => $state]);
        return $user;
    }
}

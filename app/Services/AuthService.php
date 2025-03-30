<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private AuthRepositoryInterface $authRepositoryInterface
    )
    { }

    public function index(array $pagination, array $filter)
    {
        return $this->authRepositoryInterface->index($pagination, $filter);
    }

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->authRepositoryInterface->register($data);
    }

    public function update(int $id, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->authRepositoryInterface->update($id, $data);
    }

    public function changeState(int $id)
    {
        return $this->authRepositoryInterface->changeState($id);
    }

    

}
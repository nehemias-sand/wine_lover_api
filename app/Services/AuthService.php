<?php

namespace App\Services;

use App\Jobs\SendWelcomeMail;
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
        $email = $data['email'];
        $dataEmail = [
            'username' => $data['username'],
            'password' => $data['password'],
        ];

        $data['password'] = Hash::make($data['password']);
        $user = $this->authRepositoryInterface->register($data);

        SendWelcomeMail::dispatch($email, $dataEmail);

        return $user;
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

    public static function generatePassword()
    {
        $longitud = 10;
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $password = '';

        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        return $password;
    }
}
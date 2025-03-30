<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function index(array $pagination, array $filter);
    public function register(array $data);
    public function update(int $id, array $data);
}
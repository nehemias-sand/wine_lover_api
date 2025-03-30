<?php

namespace App\Repositories;

interface PermissionTypeRepositoryInterface
{
    public function index(array $pagination, array $filter);
}

<?php

namespace App\Repositories\Implementations;

use App\Models\Department;
use App\Repositories\DepartmentRepositoryInterface;

class DepartmentPostgresRepository implements DepartmentRepositoryInterface
{
    public function index()
    {
        return Department::with('municipalities.districts')->get();
    }
}

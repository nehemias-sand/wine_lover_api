<?php

namespace App\Repositories\Implementations;

use App\Models\Profile;
use App\Repositories\ProfileRepositoryInterface;

class ProfilePostgresRepository implements ProfileRepositoryInterface
{
    public function index()
    {
        return Profile::all();
    }
}

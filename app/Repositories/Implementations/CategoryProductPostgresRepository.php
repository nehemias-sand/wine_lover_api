<?php

namespace App\Repositories\Implementations;

use App\Models\CategoryProduct;
use App\Repositories\CategoryProductRepositoryInterface;

class CategoryProductPostgresRepository implements CategoryProductRepositoryInterface
{
    public function index()
    {
        return CategoryProduct::all();
    }
}

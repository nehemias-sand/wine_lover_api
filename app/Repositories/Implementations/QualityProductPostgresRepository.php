<?php

namespace App\Repositories\Implementations;

use App\Models\QualityProduct;
use App\Repositories\QualityProductRepositoryInterface;

class QualityProductPostgresRepository implements QualityProductRepositoryInterface
{
    public function index()
    {
        return QualityProduct::all();
    }
}

<?php

namespace App\Repositories\Implementations;

use App\Models\UnitMeasurement;
use App\Repositories\UnitMeasurementRepositoryInterface;

class UnitMeasurementPostgresRepository implements UnitMeasurementRepositoryInterface
{
    public function index()
    {
        return UnitMeasurement::all();
    }
}

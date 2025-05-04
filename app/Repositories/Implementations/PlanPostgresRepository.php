<?php

namespace App\Repositories\Implementations;

use App\Models\Plan;
use App\Repositories\PlanRepositoryInterface;

class PlanPostgresRepository implements PlanRepositoryInterface
{
    public function index(){
        return Plan::all();
    }
}
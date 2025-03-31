<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit_measurement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='unit_measurement';

    protected $fillable = [
        'name'
    ];
}

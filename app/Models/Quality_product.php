<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality_product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='quality_product';

    protected $fillable = [
        'name',
        'description'
    ];
}

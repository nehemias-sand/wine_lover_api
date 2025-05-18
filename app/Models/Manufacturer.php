<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'manufacturer';

    protected $fillable = [
        'name',
        'city',
        'country',
        'description',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'manufacturer_id', 'id');
    }
}

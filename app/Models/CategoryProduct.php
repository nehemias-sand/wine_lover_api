<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='category_product';

    protected $fillable = [
        'name',
        'description'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class. 'category_product_id', 'id');
    }
}

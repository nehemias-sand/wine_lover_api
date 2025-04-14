<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'state',
        'category_product_id',
        'quality_product_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id', 'id');
    }

    public function quality(): BelongsTo
    {
        return $this->belongsTo(QualityProduct::class, 'quality_product_id', 'id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function presentations(): HasMany
    {
        return $this->hasMany(ProductPresentation::class, 'product_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Pivot
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'order_item';

    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'presentation_id',
        'amount',
        'unit_price',
        'discount',
        'subtotal_item',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class, 'presentation_id', 'id');
    }
}

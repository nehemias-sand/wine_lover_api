<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductPresentation extends Pivot
{
    protected $table = 'product_presentation';

    public $incrementing = false;

    protected $fillable = [
        'product_id',
        'presentation_id',
        'stock',
        'unit_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class, 'presentation_id', 'id');
    }
}

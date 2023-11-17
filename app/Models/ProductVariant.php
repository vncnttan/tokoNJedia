<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = "product_variants";
    protected $fillable = [
        "name",
        "price"
    ];
    protected $casts = [
        'id' => 'string',
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

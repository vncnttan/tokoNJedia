<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromoProduct extends Model
{
    use HasFactory;

    public function Promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

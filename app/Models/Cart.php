<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = null;

    protected $casts = [
        "user_id" => "string",
        "variant_id" => "string",
        "product_id" => "string",
        "quantity" => "integer"
    ];

    protected $fillable = [
        "user_id",
        "variant_id",
        "product_id",
        "quantity"
    ];
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function ProductVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}

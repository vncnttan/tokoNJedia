<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    public $incrementing = false;

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


    protected function setKeysForSaveQuery($query): Builder
    {
        return $query->where('user_id', $this->getAttribute('user_id'))
            ->where('variant_id', $this->getAttribute('variant_id'))
            ->where('product_id', $this->getAttribute('product_id'));
    }

}

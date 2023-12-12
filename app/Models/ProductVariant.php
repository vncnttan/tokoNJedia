<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = "product_variants";
    protected $fillable = [
        "name",
        "price",
        "stock"
    ];
    protected $casts = [
        'id' => 'string',
        'name' => 'string'
    ];

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function Cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function TransactionDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "user_id",
        "product_id",
        "quantity"
    ];
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}

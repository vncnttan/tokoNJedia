<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;
    protected $table = "ratings";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "user_id",
        "product_id",
        "rating",
        "message"
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", 'id');
    }
    public function ProductVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, "variant_id", "id");
    }
    public function Transaction(): BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, "transaction_id", "id");
    }
    public function Product() : BelongsTo{
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}

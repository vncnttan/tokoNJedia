<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "user_id",
        "product_id",
        "review",
        "message"
    ];


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", 'id');
    }
//    public function ProductVariant(): BelongsTo
//    {
//        return $this->belongsTo(ProductVariant::class, "variant_id", "id");
//    }
    public function TransactionHeader(): BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, "transaction_id", "id");
    }
    public function Product() : BelongsTo{
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    public function ReviewImages(): HasMany
    {
        return $this->hasMany(ReviewImage::class, "review_id", "id");
    }
    public function ReviewVideos(): HasMany
    {
        return $this->hasMany(ReviewVideo::class, "review_id", "id");
    }

    public function Reply(): HasMany
    {
        return $this->hasMany(ReviewReply::class, "review_id", "id");
    }

}

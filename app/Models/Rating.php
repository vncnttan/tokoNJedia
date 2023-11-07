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
        return $this->belongsTo(User::class, "user_id");
    }
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}

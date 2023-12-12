<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewImage extends Model
{
    use HasFactory;

    public function Review(): BelongsTo
    {
        return $this->belongsTo(Review::class, "review_id", "id");
    }
}

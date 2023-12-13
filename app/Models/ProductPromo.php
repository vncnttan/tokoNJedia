<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPromo extends Model
{
    use HasFactory;

    protected $table = "product_promos";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "promo_id",
        "product_id",
        "discount",
    ];


    public function Promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

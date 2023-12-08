<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "name",
        "price",
        "description",
        "image",
        "merchant_id",
        "product_category_id",
        "stock"
    ];
    public function Merchant(){
        return $this->belongsTo(Merchant::class, "merchant_id");
    }
    public function ProductCategory(){
        return $this->belongsTo(Merchant::class, "product_category_id");
    }
    public function Ratings(){
        return $this->hasMany(Rating::class);
    }
    public function TransactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
    public function Cart(){
        return $this->hasOne(Cart::class);
    }
}

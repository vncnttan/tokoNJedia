<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "ratings";
    protected $fillable = [
        "user_id",
        "product_id",
        "rating",
        "message"
    ];
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function Product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}

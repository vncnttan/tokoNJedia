<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $table = "merchants";
    protected $fillable = [
        "name",
        "image",
        "user_id"
    ];
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function Products(){
        return $this->hasMany(Product::class);
    }
}

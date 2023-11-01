<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    protected $fillable = [
        "transaction_id",
        "product_id",
        "quantity"
    ];
    public function TransactionHeader(){
        return $this->belongsTo(TransactionHeader::class, "transaction_header");
    }
    public function Product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}

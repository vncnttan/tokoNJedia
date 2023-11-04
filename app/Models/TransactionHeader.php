<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $table = "transaction_headers";
    protected $fillable = [
        "user_id",
        "date",
        "destination_address",
        "payment_method_id"
    ];
    public function TransactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
}

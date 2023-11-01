<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = "payment_methods";
    protected $fillable = [
        "name"
    ];
    public function TransactionHeader(){
        return $this->hasMany(TransactionHeader::class);
    }
}

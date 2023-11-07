<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = "payment_methods";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "name"
    ];
    public function TransactionHeader(): HasMany
    {
        return $this->hasMany(TransactionHeader::class);
    }
}

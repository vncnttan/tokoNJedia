<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    use HasFactory;

    protected $table = "shipments";
    public $incrementing = false;
    protected $keyType = 'string';

    public function TransactionDetail() : HasMany {
        return $this->hasMany(TransactionDetail::class);
    }
}

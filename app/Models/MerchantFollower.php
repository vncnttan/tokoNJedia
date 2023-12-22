<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantFollower extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'merchant_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
        'merchant_id' => 'string',
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }
    public function Merchant() {
        return $this->belongsTo(Merchant::class);
    }
}

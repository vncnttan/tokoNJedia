<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        "phone",
        "balance",
        "dob",
        "gender",
        "image"
    ];
    protected $table = "users";
    public function UserRooms(){
        return $this->hasMany(UserRoom::class);
    }
    public function Merchant(){
        return $this->hasOne(Merchant::class);
    }
    public function Carts(){
        return $this->hasMany(Cart::class);
    }
    public function TransactionHeaders(){
        return $this->hasMany(TransactionHeader::class);
    }
    public function Ratings(){
        return $this->hasMany(Rating::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

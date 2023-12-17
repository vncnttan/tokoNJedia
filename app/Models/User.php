<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

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
        "dob",
        "gender",
        "image",
        "google_id"
    ];
    protected $table = "users";

    public function isMerchant() {
        return Merchant::where('user_id', $this->id)->exists();
    }

    public function Messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
    public function Rooms(){
        return $this->morphToMany(Room::class, "roomable");
    }

    public function Location():MorphMany
    {
        return $this->morphMany(Location::class, "locationable");
    }

    public function Merchant(): HasOne
    {
        return $this->hasOne(Merchant::class);
    }

    public function Carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function TransactionHeaders(): HasMany
    {
        return $this->hasMany(TransactionHeader::class);
    }

    public function Reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function Following(): HasMany
    {
        return $this->hasMany(MerchantFollower::class);
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

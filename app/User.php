<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find(mixed $user)
 * @method static create(array $all)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(UserOrder::class);
    }

//    public function routeNotificationForNexmo($notification)
//    {
//       $storeNumber = trim(str_replace(['(', ')', ' ', '-'], '', $this->store->mobile_phone));
///       return '55' . $storeNumber;
//
//        return '5527998217807';
//    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Comment;

class StoreOwner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'store_owner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    public function store()
    {
        return $this->hasMany('App\Store', 'store_owner_id', 'id');
    }

    public function comment()
    {
        // HasManyの逆
        return $this->hasMany('App\Comment');
    }
}

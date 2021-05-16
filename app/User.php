<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';

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


    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function application()
    {
        if(Auth::guard('store_owner')->check())
        {
            return $this->hasMany('App\Application', 'from_user_id','id');
        }else{
            return $this->hasMany('App\Application', 'to_user_id','id');
        }  
    }

    public function comment()
    {
        // HasManyの逆
        return $this->hasMany('App\Comment');
    }
}

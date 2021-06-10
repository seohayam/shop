<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\User;
use App\Application;

class Item extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['descripotion','image','value','item_url','user_id'];

    protected $casts = [
        'user_id' => 'integer'
    ];

    // $item->user->idの
    // userの部分
    public function user()
    {
        // HasManyの逆
        // ＊\のむ気に注意
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function application()
    {
        return $this->hasMany('App\application', 'item_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\comment', 'item_id', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Like', 'item_id', 'id');
    }
}

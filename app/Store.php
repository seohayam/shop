<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['name','adress','descripotion','image','available','shop_url','owner_id'];

    // $item->user->idの
    // userの部分
    public function owner()
    {
        // HasManyの逆
        return $this->belongsTo('App\Owner');
    }

    // public function application()
    // {
    //     return $this->hasMany('App\application', 'item_id', 'id');
    // }

    // public function comment()
    // {
    //     return $this->hasMany('App\comment', 'item_id', 'id');
    // }

}

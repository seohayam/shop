<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['name','adress','descripotion','image','available','shop_url','store_owner_id'];

    // $item->user->idの
    // userの部分
    public function storeOwner()
    {
        // HasManyの逆
        return $this->belongsTo('App\StoreOwner', 'store_owner_id', 'id');
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['item_id','store_id','user_id','store_owner_id'];

    protected $casts = [
        'item_id' => 'integer',
        'store_id' => 'integer',
        'user_id' => 'integer',
        'store_owner_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function storeOwner()
    {
        return $this->belongsTo('App\StoreOwner', 'store_owner_id','id');
    }
    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id','id');
    }
    public function store()
    {
        return $this->belongsTo('App\Store', 'store_id','id');
    }

}

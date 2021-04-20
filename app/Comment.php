<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['content','from_user_id','from_store_owner_id','to_user_id','to_store_owner_id'];

    public function fromUser()
    {
            return $this->belongsTo('App\User', 'from_user_id', 'id');                            
    }

    public function fromStoreOwner()
    {
            return $this->belongsTo('App\StoreOwner', 'from_store_owner_id', 'id');                            
    }


    public function toUser()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }

    public function toStoreOwner()
    {
            return $this->belongsTo('App\StoreOwner', 'to_store_owner_id', 'id');                            
    }
}

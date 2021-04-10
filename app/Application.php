<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['item_id','from_user_id','from_store_owner_id','to_user_id','to_store_owner_id','application-status'];


    public function item()
    {
        return $this->belongsTo('App\application', 'item_id', 'id');
    }

    
    
    public function storeOwner()
    {
        if(Auth::guard('store_owner')->check())
        {
            return $this->belongsTo('App\StoreOwner', 'from_store_owner_id', 'id');                            
        }else
        {
            return $this->belongsTo('App\StoreOwner', 'to_store_owner_id', 'id');                            
        }
    }
    public function user()
    {
        if(Auth::guard('store_owner')->check())
        {
            return $this->belongsTo('App\User', 'to_user_id', 'id');
        }else{
            return $this->belongsTo('App\User', 'from_user_id', 'id');
        }
        
    }

}

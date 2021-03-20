<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Application extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['item_id','from_user_id','from_store_owner_id','to_user_id','to_store_owner_id','application-status'];


    public function item()
    {
        return $this->belongsTo('App\application', 'item_id', 'id');
    }

    public function from_user()
    {
            return $this->belongsTo('App\User', 'from_user_id', 'id');                            
    }

    // public function from_store_owner()
    // {
    //         return $this->belongsTo('App\', 'from_store_owner_id', 'id');                            
    // }


    public function to_user()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }

    // public function to_store_owner()
    // {
    //         return $this->belongsTo('App\', 'to_store_owner_id', 'id');                            
    // }

}

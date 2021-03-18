<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['item_id','from','to','application-status'];

    public function item()
    {
        return $this->belongsTo('App\application', 'item_id', 'id');
    }

    // public function comment()
    // {
    //     return $this->hasMany('App\comment', 'item_id', 'id');
    // }


}

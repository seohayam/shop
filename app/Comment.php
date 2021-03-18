<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $regurded = array('id');

    protected $fillable = ['content','from','to'];

    public function user()
    {
        // HasManyの逆
        return $this->belongsTo('App\User','from or to','id');
    }

    public function owner()
    {
        // HasManyの逆
        return $this->belongsTo('App\Owner','from or to','id');
    }
}

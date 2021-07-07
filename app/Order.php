<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

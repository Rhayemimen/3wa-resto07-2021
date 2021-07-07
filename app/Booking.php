<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
        //il connait le clé étranger s'il est user_id si non on met le nom du clé 
    }
}

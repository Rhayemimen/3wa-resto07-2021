<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $dates = ['booking_date'];//cette méthode permet de récupérer les dates apporter de la base de donnée en farmat date (pas string)

    public function user()
    {
        return $this->belongsTo('App\User');
        //il connait le clé étranger s'il est user_id si non on met le nom du clé 
    }

    public function scopeComingBookings($query)//return les nouveaux bookings
    {
        return $query->where('booking_date', '>=', now());
    }

    public function scopePassedBookings($query)//return les anciens bookings
    {
        return $query->where('booking_date', '<', now());
    }
}

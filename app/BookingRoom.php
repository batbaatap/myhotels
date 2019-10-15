<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    protected $table = 'pm_booking_room';
    public $timestamps = false;
    
    public function post()
    {
        return $this->belongsTo('App\Booking');
    }
}

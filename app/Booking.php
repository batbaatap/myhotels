<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'pm_booking';
    public $timestamps = false;

    public function brooms()
    {
        return $this->hasMany('App\BookingRoom', 'id_booking');
    }
}

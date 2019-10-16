<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'pm_booking';
    public $timestamps = false;
    
    protected $fillable = ['id_hotel'];

    public function brooms()
    {
        return $this->hasMany('App\BookingRoom', 'id_booking');
    }
}

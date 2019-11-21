<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'pm_hotel';
    public $timestamps = false;
    protected $fillable = ['lang'];

    public function brooms()
    {
        return $this->hasMany('App\HotelFile', 'id_item');
    }
}

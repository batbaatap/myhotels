<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelFile extends Model
{
    protected $table = 'pm_hotel_file';
    protected $fillable = ['lang'];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Hotel');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityFile extends Model
{
    protected $table = 'pm_facility_file';
    protected $fillable = ['lang'];
    public $timestamps = false;

    /**
     * Get the user that owns the phone.
     */
    // public function facility()
    // {
    //     return $this->belongsTo('App\Facility');
    // }    
}

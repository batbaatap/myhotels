<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'pm_facility';
    public $timestamps = false;
  
    /**
     * Get the facilityfile record associated with the facility.
     */
    // public function facilityFile()
    // {
    //     return $this->hasOne('App\FacilityFile', 'id_item');
    // }
}

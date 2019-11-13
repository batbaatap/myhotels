<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomFile extends Model
{
    protected $table = 'pm_room_file';
    protected $fillable = ['lang'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $connection = 'openbase';
    protected $table = 'intd4';

    public function emergency_attendances()
    {
        return $this->hasMany('App\EmergencyAttendance', 'c54mun', 'id4codigo');
    }

}

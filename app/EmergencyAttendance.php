<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyAttendance extends Model
{
  protected $connection = 'openbase';
  protected $table = 'cen54';

  public function city()
  {
     return $this->belongsTo('App\City', 'c54mun');
  }
}

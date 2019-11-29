<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventualSchedule extends Model
{
    //
    public function type_hour()
    {
        return $this->belongsTo('App\TypeHour');
    }
}

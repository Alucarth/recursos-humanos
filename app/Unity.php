<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    //
    public function management()
    {
        return $this->belongsTo('App\Management','managament_id');
    }

}

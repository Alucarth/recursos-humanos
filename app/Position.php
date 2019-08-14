<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    public function management()
    {
        return $this->belongsTo('App\Management');
    }

    public function unity(){
        return $this->belongsTo('App\Unity','unit_id');
    }
}

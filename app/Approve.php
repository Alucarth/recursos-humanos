<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    //
    public function position(){
        return $this->belongsTo('App\Position');
    }
}

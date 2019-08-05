<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function city_identity_card()
    {
        return $this->belongsTo('App\City','city_identity_card_id');
    }
}

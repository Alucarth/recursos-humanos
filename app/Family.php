<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function kinship()
    {
        return $this->belongsTo('App\Kinship');
    }
    public function health_box()
    {
        return $this->belongsTo('App\HealthBox','healh_box_id');
    }
}

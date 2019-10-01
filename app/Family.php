<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function kinship()
    {
        return $this->belongsTo('App\Kinship');
    }
}

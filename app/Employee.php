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
    public function contribution()
    {
        return $this->belongsTo('App\Contribution');
    }
    public function management()
    {
        return $this->belongsTo('App\Management');
    }
    public function families()
    {
        return $this->hasMany('App\Family');
    }
    public function academic_trainings()
    {
        return $this->hasMany('App\AcademicTraining');
    }
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}

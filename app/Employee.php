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
        return $this->hasMany('App\Family')->with('kinship');
    }
    public function academic_trainings()
    {
        return $this->hasMany('App\AcademicTraining');
    }
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
    public function languages()
    {
        return $this->hasMany('App\Language');
    }
    public function packages()
    {
        return $this->hasMany('App\Package');
    }
    public function health_box()
    {
        return $this->belongsTo('App\HealthBox','healh_box_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function works()
    {
        return $this->hasMany('App\WorkExperience');
    }
    public function unity()
    {
        return $this->belongsTo('App\Unity');
    }
    public function type_hours()
    {
        return $this->belongsToMany('App\TypeHour','employee_type_hours','employee_id','type_hour_id');
    }
    public function getFullName()
    {
        $first_name = $this->first_name??'';
        $last_name = $this->last_name??'';
        $mother_last_name = $this->mother_last_name??'';
        return $first_name .' '.$last_name.' '.$mother_last_name;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRequest extends Model
{
    //
    public function request_type()
    {
        return $this->belongsTo('App\RequestType');
    }

    public function approves()
    {
        return $this->hasMany('App\Approve')->with('position')->orderBy('id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }
}

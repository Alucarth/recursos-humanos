<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
	public function citys() {
		return $this->belongsTo('App\City', 'city_id');
	}
}

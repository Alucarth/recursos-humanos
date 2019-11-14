<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refreshment extends Model {
	protected $fillable = ['id', 'employee_id', 'days_work_month', 'sunday_holiday', 'low_license', 'faults', 'holidays', 'commissions', 'ross_amount', 'invoices_110', 'days_subject_to_payment', 'hold_time', 'total_net_snack', 'commission_for_deposit', 'total_snack_to_deposit', 'date', 'hour_in', 'state', 'user_id', 'product_for_consumption'];
	public function employes() {
		return $this->hasMany('App\Employee');
	}
}

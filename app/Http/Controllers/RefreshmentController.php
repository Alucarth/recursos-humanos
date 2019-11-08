<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Location;
use App\Refreshment;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class RefreshmentController extends Controller {

	public function index() {
		//
	}

	public function create() {
		//
	}

	public function store(Request $request) {
		$fecha = new Carbon;
		$date = $fecha->format('d-m-Y');
		$hour = $fecha->format('H:m');
		$refrigerio = Refreshment::create([
			'employee_id' => $request->employee_id,
			'days_work_month' => $request->days_work_month,
			'sunday_holiday' => $request->sunday_holiday,
			'low_license' => $request->low_license,
			'faults' => $request->faults,
			'holidays' => $request->holidays,
			'commissions' => $request->commissions,
			'ross_amount' => $request->ross_amount,
			'invoices_110' => $request->invoices_110,
			'hold_time' => $request->hold_time,
			'total_net_snack' => $request->total_net_snack,
			'days_subject_to_payment' => $request->days_subject_to_payment,
			'product_for_consumption' => $request->product_for_consumption,
			'commission_for_deposit' => $request->commission_for_deposit,
			'total_snack_to_deposit' => $request->total_snack_to_deposit,
			'date' => $request->date,
			'hour_in' => $hour,
			'state' => 'A',
			'user_id' => Auth::user()->usr_id,
		]);
		return response()->json();
	}

	public function show($id) {
		//
	}

	public function edit($id) {
		//
	}

	public function update(Request $request, $id) {
		try {
			$refrigerio = Refreshment::find($id);
			//return response()->json($refrigerio);
			$refrigerio->fill($request->all());
			$refrigerio->save();
			return response()->json(["success" => "true", "mensaje" => "se actualizo el refrigerio correctamente", "data" => $refrigerio]);
		} catch (\Illuminate\Database\QueryException $ex) {
			return response()->json(["success" => "false", "mensaje" => "No se pudo actualizar el activo intente nuevamente", "data" => $ex]);
		}
	}

	public function destroy($id) {
		//
	}

	public function listEmploye($fecha_entrada, $planta) {
		$fecha_date = new Carbon($fecha_entrada);
		$day = Carbon::parse($fecha_date)->day;
		$month = Carbon::parse($fecha_date)->month;
		$year = Carbon::parse($fecha_date)->year;
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$fecha = Carbon::parse(new Carbon);
		$mes = $meses[($fecha->format('n')) - 1];
		$inputs['Fecha'] = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
		$diasmes = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$persona = Employee::select(DB::raw("CONCAT(first_name,' ',second_name,' ',last_name,' ',mother_last_name) as full_name"), 'rrhh.employees.id', 'identity_card', 'address', 'position_id', 'c.name as cargo', 'management_id', 'm.name as gerencia', 'account_number')
			->leftjoin('rrhh.positions as c', 'c.id', '=', 'position_id')
			->leftjoin('rrhh.managements as m', 'm.id', '=', 'management_id')
			->where('location_id', $planta)
			->whereNotIn('rrhh.employees.id', function ($q) use ($year, $month) {
				$q->select('rrhh.refreshments.employee_id')
					->from('rrhh.refreshments')
					->whereYear('date', '=', $year)
					->whereMonth('date', '=', $month);
			})
			->get();
		return response()->json(["empleados" => $persona, "fecha" => $inputs, "dias_mes" => $diasmes]);
	}

	public function lstRefresment($fecha_entrada, $planta) {
		$fecha_date = new Carbon($fecha_entrada);
		$day = Carbon::parse($fecha_date)->day;
		$month = Carbon::parse($fecha_date)->month;
		$year = Carbon::parse($fecha_date)->year;
		try {
			$refrigerio = Refreshment::select(DB::raw("CONCAT(e.first_name,' ',e.second_name,' ',e.last_name,' ',e.mother_last_name) as full_name"), 'rrhh.refreshments.id', 'e.id as employe_id', 'e.identity_card', 'e.address', 'e.account_number', 'days_work_month', 'sunday_holiday', 'low_license', 'faults', 'holidays', 'commissions', 'days_subject_to_payment', 'ross_amount', 'invoices_110', 'hold_time', 'total_net_snack', 'commission_for_deposit', 'total_snack_to_deposit', 'date', 'hour_in', 'product_for_consumption')
				->join('rrhh.employees as e', 'e.id', '=', 'employee_id')
				->where('e.location_id', $planta)
				->whereYear('date', '=', $year)
				->whereMonth('date', '=', $month)
				->orderby('id', 'desc')
				->get();
			return response()->json(["success" => "true", "mensaje" => "se registro la planilla exitosamente", "data" => $refrigerio]);
		} catch (\Illuminate\Database\QueryException $ex) {
			return response()->json(["success" => "false", "mensaje" => "No se pudo registrar el activo intente nuevamente", "data" => $ex]);
		}
	}

	public function generarPlanillaMensual($fecha_entrada, Request $request) {
		$fecha = new Carbon;
		$date = $fecha->format('d-m-Y');
		$hour = $fecha->format('H:m');
		$fecha_date = new Carbon($fecha_entrada);
		$day = Carbon::parse($fecha_date)->day;
		$month = Carbon::parse($fecha_date)->month;
		$year = Carbon::parse($fecha_date)->year;
		try {
			$persona = Employee::select(DB::raw("CONCAT(first_name,' ',second_name,' ',last_name,' ',mother_last_name) as full_name"), 'rrhh.employees.id', 'identity_card', 'address', 'position_id', 'c.name as cargo', 'management_id', 'm.name as gerencia', 'account_number')
				->leftjoin('rrhh.positions as c', 'c.id', '=', 'position_id')
				->leftjoin('rrhh.managements as m', 'm.id', '=', 'management_id')
				->where('location_id', $request->location_id)
				->whereNotIn('rrhh.employees.id', function ($q) use ($year, $month) {
					$q->select('rrhh.refreshments.employee_id')
						->from('rrhh.refreshments')
						->whereYear('date', '=', $year)
						->whereMonth('date', '=', $month);
				})
				->get();
			if (count($persona) > 0) {
				foreach ($persona as $per) {
					$refrigerio = Refreshment::create([
						'employee_id' => $per->id,
						'days_work_month' => $request->days_work_month,
						'sunday_holiday' => $request->sunday_holiday,
						'low_license' => $request->low_license,
						'faults' => $request->faults,
						'holidays' => $request->holidays,
						'commissions' => $request->commissions,
						'ross_amount' => $request->ross_amount,
						'invoices_110' => $request->invoices_110,
						'hold_time' => $request->hold_time,
						'total_net_snack' => $request->total_net_snack,
						'commission_for_deposit' => $request->commission_for_deposit,
						'product_for_consumption' => $request->product_for_consumption,
						'total_snack_to_deposit' => $request->total_snack_to_deposit,
						'days_subject_to_payment' => $request->days_subject_to_payment,
						'date' => $request->date,
						'hour_in' => $hour,
						'state' => 'A',
						'user_id' => Auth::user()->usr_id,
					]);
				}
				return response()->json(["success" => "true", "mensaje" => "se registro los refrigerios para este mes", "data" => $refrigerio]);
			} else {
				return response()->json(["success" => "true", "mensaje" => "se registro los refrigerios para este mes", "data" => "sin_data"]);
			}

		} catch (\Illuminate\Database\QueryException $ex) {
			return response()->json(["success" => "false", "mensaje" => "No se pudo registrar el refrigerio intente nuevamente", "data" => $ex]);
		}

	}

	public function print_demo() {
		$title = "Reporte ";
		$storage = 'almacen isabel';
		$date = date('d-m-Y');
		$username = 'usuario prueba';
		$view = \View::make('layouts.print', compact('title', 'date', 'username', 'storage'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content);
		return $pdf->inline();
	}

	public function lstLocations() {
		try {
			$location = Location::with('citys')->get();
			return response()->json(["success" => "true", "mensaje" => "se consulto los datos correctamente", "data" => $location]);
		} catch (\Illuminate\Database\QueryException $ex) {
			return response()->json(["success" => "false", "mensaje" => "No se pudo consultar los datos intente nuevamente", "data" => $ex]);
		}
	}

	public function generateCart() {
		$employe = Employee::select()->get();
		foreach ($employe as $emp) {
			$employeee = Employee::select()->where('id', $emp->id)->update(["account_number" => rand(1, 800000000)]);
		}
		return response()->json("exito");
	}
}
<?php

namespace App\Http\Controllers;

use App;
use App\AttendanceEmployee;
use App\Employee;
use App\EmployeeRequest;
use App\Holyday;
use App\Location;
use App\Refreshment;
use App\Sanction;
use App\User;
use Carbon\Carbon;
use DB;
use Log;
use Maatwebsite\Excel\Facades\Excel;
use Util;

class ReportController extends Controller {
	public function ficha_personal($id) {
		$title = "FICHA PERSONAL";
		$area = 'DEPARTAMENTO DE GESTIÓN DEL TALENTO HUMANO';
		$date = date('d-m-Y');
		$username = 'usuario prueba';
		$type_report = "FICHA TECNICA";
		// // $html = '<h1>Hello world</h1>';
		// return view('layouts.print', compact('username','date','title'));
		$employee = Employee::with('families', 'courses', 'languages', 'packages', 'academic_trainings')->find($id);
		//return $employee;
		$view = \View::make('report.ficha_personal', compact('title', 'date', 'username', 'area', 'type_report', 'employee'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content);
		//$pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0); //SETTEANDO LANDSCAPE HORIZONTAL
		return $pdf->inline();
	}

	public function boleta($id) {
		$employee_request = EmployeeRequest::find($id);
		$title = $employee_request->request_type->name;
		$date = date('d-m-Y');

		$persona = $employee_request->employee->getFullName();
		//return $persona;
		$gerencia = $employee_request->employee->management->name ?? '';
		$unidad = $employee_request->employee->unity->name ?? '';
		//return $employee;
		// return view('report.boleta', compact('title','date','persona','gerencia','unidad','employee_request'));
		$view = \View::make('report.boleta', compact('title', 'date', 'persona', 'gerencia', 'unidad', 'employee_request'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content);
		return $pdf->inline();

    }
    public function attendance_employee_date($employee_id,$from_date,$to_date)
    {
        $minutos_atraso = 0;
		$omisiones = 0;
		$dias_haber = 0;
		$horas_trabajadas = 0;
		$horas_adicionales = 0;
		$cantidad_atrasos = 0;
		$cantidad_faltas = 0;
		$entry = null;
        $output = null;



        $employee=Employee::find($employee_id);
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);


        $title = 'Tarjeta de Asistencia';
		$date = date('d-m-Y');

		$persona = $employee->getFullName();
		//return $persona;
		$cargo = $employee->position->name ?? '';

        $days = cal_days_in_month(CAL_GREGORIAN, $from_date->month, $from_date->year);
		$day = $from_date->day;
		$month = $from_date->month;
        $year = $from_date->year;
        $attendances = [];
        //valid
        $diference_day=$to_date->diffInDays($from_date);
        if($diference_day<0)
        {
            return 'no se pudo validar las fechas para el calculo favor de verificar';
        }

        while($to_date->diffInDays($from_date)>0)
        {
            //verificando cantidad de dias numericos
            //Log::info($from_date->toDateString());
            $from_date->addDay(1);

            foreach(Util::getAttendance($employee,$from_date->toDateString()) as $attendance)
            {
                array_push($attendances,$attendance);
            }

        }

        $view = \View::make('report.attendance_kardex_detail', compact('title', 'date', 'persona', 'cargo','attendances'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content);
        return $pdf->inline();

        // return compact('from_date','to_date','employee','attendances');
    }

    public function attendance_employee($employee_id,$f_date,$t_date)
    {

		$minutos_atraso = 0;
		$omisiones = 0;
		$dias_haber = 0;
		$horas_trabajadas = 0;
		$horas_adicionales = 0;
		$cantidad_atrasos = 0;
		$cantidad_faltas = 0;
        $atrasos=0;

        $employee=Employee::find($employee_id);
        $from_date = Carbon::parse($f_date);
        $to_date = Carbon::parse($t_date);

        //estableciendo metodo de calculo XD
        $diference_day=$to_date->diffInDays($from_date);
        if($diference_day<0)
        {
            return 'no se pudo validar las fechas para el calculo favor de verificar';
        }

        while($to_date->diffInDays($from_date)>0)
        {
            //verificando cantidad de dias numericos
            //Log::info($from_date->toDateString());
            $from_date->addDay(1);

            foreach(Util::getAttendance($employee,$from_date->toDateString()) as $attendance)
            {
                if($attendance->title_entry == 'Omision')
                {
                    $omisiones +=1;
                }
                if($attendance->delay)
                {
                    $minutos_atraso +=$attendance->delay;
                }

            }

        }

		$sanction_atraso = 0;
		$sanction = Sanction::where('from', '<=', $minutos_atraso)
			->where('to', '>=', $minutos_atraso)
			->where('type', 'leve')
			->first();
		if ($sanction) {
			$dias_haber += $sanction->days;
			$sanction_atraso += $sanction->days;
		}

		$omision_sanction = Sanction::where('from', '<=', $omisiones)
			->where('to', '>=', $omisiones)
			->where('type', 'omision')
			->first();
		$sanction_omision = 0;
		if ($omision_sanction) {
			$dias_haber += $omision_sanction->days;
			$sanction_omision += $omision_sanction->days;
		}

		$discount_day = (float) $employee->salary / 30;
		$discount = $discount_day * $dias_haber;

		$date = Carbon::now();
		$title = 'Tarjeta de Asistencia';
		$persona = $employee->getFullName();
		$gerencia = $employee->management ? $employee->management->name : '';
		$unidad = $employee->unity ? $employee->unity->name : '';
		$horas_adicionales = (float) $horas_adicionales / 60;
		$horas_trabajadas = (float) $horas_trabajadas / 60;
		$horas_adicionales = Util::formatMoney($horas_adicionales);
		$horas_trabajadas = Util::formatMoney($horas_trabajadas);
		$view = \View::make('report.attendance_kardex',
			compact('title',
				'date',
				'persona',
				'employee',
				'unidad',
				'gerencia',
				'minutos_atraso',
				'omisiones',
				'sanction',
				'omision_sanction',
				'discount',
				'dias_haber',
				'discount_day',
				'sanction_atraso',
				'sanction_omision',
				'cantidad_atrasos',
				'horas_adicionales',
				'horas_trabajadas'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content);
		return $pdf->inline();

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
    //revisar esto XD
	public function ReportMonth($fecha_entrada, $user_id, $planta) {

		ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
		ini_set('memory_limit', '2048M');
		$fecha_date = new Carbon($fecha_entrada);
		$day = Carbon::parse($fecha_date)->day;
		$month = Carbon::parse($fecha_date)->month;
		$mes = "";
		$year = Carbon::parse($fecha_date)->year;
		switch ($month) {
		case 1:
			$mes = "ENERO";
			break;
		case 2:
			$mes = "FEBRERO";
			break;
		case 3:
			$mes = "MARZO";
			break;
		case 4:
			$mes = "ABRIL";
			break;
		case 5:
			$mes = "MAYO";
			break;
		case 6:
			$mes = "JUNIO";
			break;
		case 7:
			$mes = "JULIO";
			break;
		case 8:
			$mes = "AGOSTO";
			break;
		case 9:
			$mes = "SEPTIEMBRE";
			break;
		case 10:
			$mes = "OCTUBRE";
			break;
		case 11:
			$mes = "NOVIEMBRE";
			break;
		case 12:
			$mes = "DICIEMBRE";
			break;

		}
		$refrigerio = Refreshment::select(DB::raw("CONCAT(e.first_name,' ',e.second_name,' ',e.last_name,' ',e.mother_last_name) as full_name"), 'e.id', 'e.identity_card', 'e.address', 'e.account_number', 'days_work_month', 'sunday_holiday', 'low_license', 'faults', 'holidays', 'commissions', 'days_subject_to_payment', 'ross_amount', 'invoices_110', 'hold_time', 'total_net_snack', 'commission_for_deposit', 'total_snack_to_deposit', 'date', 'hour_in', 'product_for_consumption')
			->join('rrhh.employees as e', 'e.id', '=', 'employee_id')
			->whereYear('date', '=', $year)
			->whereMonth('date', '=', $month)
			->get();
		//return response()->json($refrigerio);
		$username = User::find($user_id);
		$title = "PLANILLA PARA PAGO DE REFRIGERIO " . $mes;
		$date = Carbon::now();
		$persona = "PROBANSDOOOOOOO NOMBRE";
		$gerencia = "PRUEBA 222";
		$storage = null; //cambiar esto no me acuerdo por que lo deje estatico XD
		$code = 'PRUEBA001';
		$count = 0;
		$total_quantity = 0;
		$location = Location::find($planta);
		$view = \View::make('report.refrigerio', compact('username', 'date', 'title', 'storage', 'refrigerio', 'persona', 'gerencia', 'code', 'count', 'total_quantity', 'location'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0);
		return $pdf->inline();
	}

	public function ReportYear($fecha_entrada, $user_id, $planta) {
		ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
		ini_set('memory_limit', '2048M');
		$fecha_date = new Carbon($fecha_entrada);
		$day = Carbon::parse($fecha_date)->day;
		$month = Carbon::parse($fecha_date)->month;
		$year = Carbon::parse($fecha_date)->year;
		$refrigerio = Refreshment::select(DB::raw("CONCAT(e.first_name,' ',e.second_name,' ',e.last_name,' ',e.mother_last_name) as full_name"), 'e.id', 'e.identity_card', 'e.address', 'e.account_number', 'days_work_month', 'sunday_holiday', 'low_license', 'faults', 'holidays', 'commissions', 'days_subject_to_payment', 'ross_amount', 'invoices_110', 'hold_time', 'total_net_snack', 'commission_for_deposit', 'total_snack_to_deposit', 'date', 'hour_in', 'product_for_consumption')
			->join('rrhh.employees as e', 'e.id', '=', 'employee_id')
			->whereYear('date', '=', $year)
			->orderBy('date', 'asc')
			->get();
		$username = User::find($user_id);
		$title = "REPORTE GENERAL PLANILLA REFRIGERIOS GESTION " . $year;
		$date = Carbon::now();
		$persona = "PROBANDO DEMO";
		$gerencia = "PRUEBA 222";
		$storage = null; //cambiar esto no me acuerdo por que lo deje estatico XD
		$code = 'PRUEBA001';
		$count = 0;
		$total_quantity = 0;
		$location = Location::find($planta);
		$view = \View::make('report.refrigerioGeneral', compact('username', 'date', 'title', 'storage', 'refrigerio', 'persona', 'gerencia', 'code', 'count', 'total_quantity', 'location'));
		$html_content = $view->render();
		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadHTML($html_content)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0);
		return $pdf->inline();
	}

	public function reportMonthExcel($fecha_entrada, $user_id, $tipo_doc, $planta) {
		$location = Location::find($planta);
		ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
		ini_set('memory_limit', '2048M');
		$fecha_date = new Carbon($fecha_entrada);
		$day = Carbon::parse($fecha_date)->day;
		$month = Carbon::parse($fecha_date)->month;
		$year = Carbon::parse($fecha_date)->year;
		$fecha_date_actual = new Carbon();
		$day_actual = Carbon::parse($fecha_date_actual)->day;
		$month_actual = Carbon::parse($fecha_date_actual)->month;
		$year_actual = Carbon::parse($fecha_date_actual)->year;
		$username = User::find($user_id);
		switch ($month) {
		case 1:
			$mes = "ENERO";
			break;
		case 2:
			$mes = "FEBRERO";
			break;
		case 3:
			$mes = "MARZO";
			break;
		case 4:
			$mes = "ABRIL";
			break;
		case 5:
			$mes = "MAYO";
			break;
		case 6:
			$mes = "JUNIO";
			break;
		case 7:
			$mes = "JULIO";
			break;
		case 8:
			$mes = "AGOSTO";
			break;
		case 9:
			$mes = "SEPTIEMBRE";
			break;
		case 10:
			$mes = "OCTUBRE";
			break;
		case 11:
			$mes = "NOVIEMBRE";
			break;
		case 12:
			$mes = "DICIEMBRE";
			break;

		}
		$refrigerio = Refreshment::select(DB::raw("CONCAT(e.first_name,' ',e.second_name,' ',e.last_name,' ',e.mother_last_name) as full_name"), 'e.id', 'e.identity_card', 'e.address', 'e.account_number', 'days_work_month', 'sunday_holiday', 'low_license', 'faults', 'holidays', 'commissions', 'days_subject_to_payment', 'ross_amount', 'invoices_110', 'hold_time', 'total_net_snack', 'commission_for_deposit', 'total_snack_to_deposit', 'date', 'hour_in', 'product_for_consumption')
			->join('rrhh.employees as e', 'e.id', '=', 'employee_id')
			->whereYear('date', '=', $year)
			->whereMonth('date', '=', $month)
			->get();
		$location = Location::find($planta);
		if ($tipo_doc == 'excel') {
			Excel::create('rptRefrigerio', function ($excel) use ($refrigerio, $fecha_date, $username, $mes, $location, $year) {
				$excel->sheet('rptRefrigerio', function ($sheet) use ($refrigerio, $fecha_date, $username, $mes, $location, $year) {
					$sheet->loadView('reportExcel.rptRefrigerio', array('refrigerio' => $refrigerio, "date" => $fecha_date, "usuario" => $username, "mes" => $mes, "location" => $location, "anio" => $year));
				});
			})->export('xls');
		} else if ($tipo_doc == 'csv') {
			Excel::create('rptRefrigerio', function ($excel) use ($refrigerio, $fecha_date, $username, $mes, $location, $year) {
				$excel->sheet('rptRefrigerio', function ($sheet) use ($refrigerio, $fecha_date, $username, $mes, $location, $year) {
					$sheet->loadView('reportExcel.rptRefrigeriocsv', array('refrigerio' => $refrigerio, "date" => $fecha_date, "usuario" => $username, "mes" => $mes, "location" => $location, "anio" => $year));
				});
			})->export('csv');
		} else if ($tipo_doc == 'txt') {
			$name = "refrigerioBanco.txt";
			$handle = fopen($name, "w");
			fwrite($handle, "REFRI" . $mes . $year . $location->name . "xxxxxx00060" . $day_actual . $month_actual . $year_actual . "\n");
			$totalBanco = 0;
			foreach ($refrigerio as $value) {
				$totalBanco += $value->total_snack_to_deposit;
			}
			foreach ($refrigerio as $key => $item) {
				if ($key == 0) {
					fwrite($handle, "100000285372790000" . $totalBanco . "1\n");
					fwrite($handle, $item->id . "100000" . $item->account_number . $item->total_snack_to_deposit . "1\n");
				} else {
					fwrite($handle, $item->id . "100000" . $item->account_number . $item->total_snack_to_deposit . "1\n");
				}
			}
			fclose($handle);
			readfile($name);
			exit;
		}

	}
}

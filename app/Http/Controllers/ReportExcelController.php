<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Management;
use App\Employee;
use Carbon\Carbon;
use Util;
use App\Sanction;
class ReportExcelController extends Controller
{
    //
    public function payroll($management_id,$f_date,$t_date)
    {

        // return 'hello';
        $management = Management::find($management_id);
        // return $management;
        $employees = Employee::where('management_id',$management->id)->get();

        foreach ($employees as $employee) {

            // $employee=Employee::find($employee_id);
            $atrasos = 0;
            $omision = 0;
            $from_date = Carbon::parse($f_date);
            $to_date = Carbon::parse($t_date);

            $attendances = [];

            $diference_day=$to_date->diffInDays($from_date);
            if($diference_day<0)
            {
                return 'no se pudo validar las fechas para el calculo favor de verificar';
                break;
            }

            while($to_date->diffInDays($from_date)>0)
            {
                //verificando cantidad de dias numericos
                // Log::info($from_date->toDateString());
                $from_date->addDay(1);

                foreach(Util::getAttendance($employee,$from_date->toDateString()) as $attendance)
                {
                    if($attendance->delay)
                    {
                        $atrasos +=$attendance->delay;
                    }
                    // array_push($attendances,$attendance);
                }

            }
            $dias_haber=0;
            $employee->delay = $atrasos;
            $sanction_atraso = 0;
            $sanction = Sanction::where('from', '<=', $employee->delay)
                ->where('to', '>=', $employee->delay)
                ->where('type', 'leve')
                ->first();
            if ($sanction) {
                $dias_haber += $sanction->days;
                $sanction_atraso += $sanction->days;
            }
            $omisiones=0;
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
            $employee->discount = $discount_day * $dias_haber;
            $employee->delay_discount = $employee->delay_discount *$discount_day;

            $employee->sanction = $omisiones;
            $employee->sanction_discount = $employee->sanction *$discount_day;

        }



        // return $employees;
        // $employees=[];
        Excel::create('Planilla Empleados', function($excel)  use ($employees,$f_date,$t_date,$management) {
		    $excel->sheet('planilla empleados', function($sheet)  use ($employees,$f_date,$t_date){
		      $sheet->loadView('reportExcel.payroll',compact('employees','f_date','t_date'));
		    });
		})->export('xls');
    }
}

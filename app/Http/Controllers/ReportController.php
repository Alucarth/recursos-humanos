<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use App\Employee;
use App\EmployeeRequest;
use App\AttendanceEmployee;
use Carbon\Carbon;
use App\Biometric;
use App\Holyday;
use Util;
use Log;

class ReportController extends Controller
{
    public function ficha_personal($id)
    {
        $title = "FICHA PERSONAL";
        $area = 'DEPARTAMENTO DE GESTIÓN DEL TALENTO HUMANO';
        $date = date('d-m-Y');
        $username = 'usuario prueba';
        $type_report = "FICHA TECNICA";
        // // $html = '<h1>Hello world</h1>';
        // return view('layouts.print', compact('username','date','title'));
        $employee = Employee::with('families','courses','languages','packages','academic_trainings')->find($id);
        //return $employee;
        $view = \View::make('report.ficha_personal', compact('title','date','username','area','type_report','employee'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        //$pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0); //SETTEANDO LANDSCAPE HORIZONTAL
        return $pdf->inline();
    }

    public function boleta($id)
    {
        $employee_request = EmployeeRequest::find($id);
        $title = $employee_request->request_type->name;
        $date = date('d-m-Y');

        $persona = $employee_request->employee->getFullName();
        //return $persona;
        $gerencia = $employee_request->employee->management->name??'';
        $unidad = $employee_request->employee->unity->name??'';
        //return $employee;
        // return view('report.boleta', compact('title','date','persona','gerencia','unidad','employee_request'));
        $view = \View::make('report.boleta', compact('title','date','persona','gerencia','unidad','employee_request'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }
    public function attendance_employee($id)
    {

        $min_atraso=0;
        $dias_haber=0;

        $employee = Employee::find($id);

        $date = Carbon::now();
        $before_date = Carbon::now();

        if($before_date->month -1 ==0 ) //en caso de de cobro de enero
        {

            $before_date->month = 12;
            $before_date->year = $before_date->year-1;
        }else
        {
            $before_date->month = $before_date->month-1;
        }
        $before_date->day=21;

        $days=cal_days_in_month(CAL_GREGORIAN,$before_date->month , $before_date->year);
        $day=$days;
        $month = $before_date->month;
        $year = $before_date->year;
        // Log::info();
        // $employee = Employee::find(23);
        $attendances = [];

        for ($d=21; $d <= $days ; $d++)
        {
            if($d<=$day)
            {

                foreach($employee->type_hours as $type_hour)
                {

                    $date = Carbon::create($year,$month,$d)->toDateString();
                    if(Util::validDay($date,$type_hour))
                    {

                        $holyday = Holyday::where('date',$date)->first();
                        if($holyday)  //si existe la fecha festiva
                        {
                            //se omite el marcado al ser feriado  XD
                            $attendance_entry = array('date'=>$date,'time'=> $holyday->name,'state'=>'primary');
                            array_push($attendances,$attendance_entry);
                            array_push($attendances,$attendance_entry);

                        }else{
                            // en caso de no encontrar fecha festiva
                            $attendance_entry = AttendanceEmployee::where('date',$date)
                                                    // ->whereBetween('time',[$type_hour->start_of_entry, $type_hour->end_of_entry])
                                                    ->where('time','>=',$type_hour->start_of_entry)
                                                    ->where('time','<=',$type_hour->end_of_entry)
                                                    ->where('employee_id',$employee->id)
                                                    ->first();
                            if($attendance_entry)
                            {

                                $array_start_time = explode(':',$type_hour->start_of_entry);
                                $array_tolerance_time = explode(':',$type_hour->tolerance_entry);
                                $minutes = (int) $array_start_time[1] + (int) $array_tolerance_time[1];
                                $hours = (int) $array_start_time[0] + (int) $array_tolerance_time[0];
                                if($minutes >=60)
                                {
                                    $minutes -= 60;
                                    $hours++;
                                }

                                $time =  Carbon::create(0,0,0,$hours,$minutes)->toTimeString();
                                // Log::info($time);
                                if($attendance_entry->time >=$type_hour->start_of_entry && $attendance_entry->time <= $time)
                                {
                                    $attendance_entry->state = 'success';
                                }else
                                {
                                    $attendance_entry->state = 'warning';
                                }
                                array_push($attendances,$attendance_entry);
                            }else
                            {

                                $attendance_entry = array('date'=>$date,'time'=> 'Sin Marcado','state'=>'error');

                                array_push($attendances,$attendance_entry);
                            }

                            $attendance_output = AttendanceEmployee::where('date',$date)
                                                    // ->whereBetween('time',[$type_hour->start_of_output, $type_hour->end_of_output])
                                                    ->where('time','>=',$type_hour->start_of_output)
                                                    ->where('time','<=',$type_hour->end_of_output)
                                                    ->where('employee_id',$employee->id)
                                                    ->first();
                            if($attendance_output)
                            {

                                if($attendance_output->time >=$type_hour->output && $attendance_output->time <= $type_hour->end_of_output)
                                {
                                    $attendance_output->state = 'success';
                                }else
                                {
                                    $attendance_output->state = 'warning';
                                }
                                array_push($attendances,$attendance_output);
                            }else
                            {
                                $attendance_entry = array('date'=>$date,'time'=> 'Sin Marcado','state'=>'error');
                                array_push($attendances,$attendance_entry);
                            }
                        }
                    }


                }
            }
        }

        //mes actual XD
        $date = Carbon::now();
        $day=explode('-',$date)[2];
        $days=cal_days_in_month(CAL_GREGORIAN,$date->month , $date->year);
        $month = $date->month;
        $year = $date->year;
        for ($d=1; $d <= $days ; $d++)
        {
            //buscar marcados solo para los horarios del dia XD

            if($d<=$day)
            {

                foreach($employee->type_hours as $type_hour)
                {

                    $date = Carbon::create($year,$month,$d)->toDateString();
                    if(Util::validDay($date,$type_hour))
                    {

                        $holyday = Holyday::where('date',$date)->first();
                        if($holyday)  //si existe la fecha festiva
                        {
                            //se omite el marcado al ser feriado  XD
                            $attendance_entry = array('date'=>$date,'time'=> $holyday->name,'state'=>'primary');
                            array_push($attendances,$attendance_entry);
                            array_push($attendances,$attendance_entry);

                        }else{
                            // en caso de no encontrar fecha festiva
                            $attendance_entry = AttendanceEmployee::where('date',$date)
                                                    // ->whereBetween('time',[$type_hour->start_of_entry, $type_hour->end_of_entry])
                                                    ->where('time','>=',$type_hour->start_of_entry)
                                                    ->where('time','<=',$type_hour->end_of_entry)
                                                    ->where('employee_id',$employee->id)
                                                    ->first();
                            if($attendance_entry)
                            {

                                $array_start_time = explode(':',$type_hour->start_of_entry);
                                $array_tolerance_time = explode(':',$type_hour->tolerance_entry);
                                $minutes = (int) $array_start_time[1] + (int) $array_tolerance_time[1];
                                $hours = (int) $array_start_time[0] + (int) $array_tolerance_time[0];
                                if($minutes >=60)
                                {
                                    $minutes -= 60;
                                    $hours++;
                                }

                                $time =  Carbon::create(0,0,0,$hours,$minutes)->toTimeString();
                                // Log::info($time);
                                if($attendance_entry->time >=$type_hour->start_of_entry && $attendance_entry->time <= $time)
                                {
                                    $attendance_entry->state = 'success';
                                }else
                                {
                                    $attendance_entry->state = 'warning';
                                }
                                array_push($attendances,$attendance_entry);
                            }else
                            {

                                $attendance_entry = array('date'=>$date,'time'=> 'Sin Marcado','state'=>'error');

                                array_push($attendances,$attendance_entry);
                            }

                            $attendance_output = AttendanceEmployee::where('date',$date)
                                                    // ->whereBetween('time',[$type_hour->start_of_output, $type_hour->end_of_output])
                                                    ->where('time','>=',$type_hour->start_of_output)
                                                    ->where('time','<=',$type_hour->end_of_output)
                                                    ->where('employee_id',$employee->id)
                                                    ->first();
                            if($attendance_output)
                            {

                                if($attendance_output->time >=$type_hour->output && $attendance_output->time <= $type_hour->end_of_output)
                                {
                                    $attendance_output->state = 'success';
                                }else
                                {
                                    $attendance_output->state = 'warning';
                                }
                                array_push($attendances,$attendance_output);
                            }else
                            {
                                $attendance_entry = array('date'=>$date,'time'=> 'Sin Marcado','state'=>'error');
                                array_push($attendances,$attendance_entry);
                            }
                        }
                    }


                }
            }

        }
        return response()->json(compact('attendances'));
    }

    public function print_demo()
    {
    	$title = "Reporte ";
        $storage = 'almacen isabel';
        $date = date('d-m-Y');
        $username = 'usuario prueba';
    	$view = \View::make('layouts.print',compact('title','date','username','storage'));
    	$html_content = $view->render();
    	$pdf = App::make('snappy.pdf.wrapper');
    	$pdf->loadHTML($html_content);
    	return $pdf->inline();
    }
}

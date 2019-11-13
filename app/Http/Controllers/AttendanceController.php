<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceEmployee;
use Auth;
use Carbon\Carbon;
use App\Biometric;
use App\Employee;
use Log;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee = Auth::user()->employee;
        $date = Carbon::now();
        $days=cal_days_in_month(CAL_GREGORIAN,$date->month , $date->year);
        $month = $date->month;
        $year = $date->year;
        // $employee = Employee::find(23);
        $attendances = [];
        for ($d=1; $d <= $days ; $d++)
        {
            //buscar marcados solo para los horarios del dia XD
            foreach($employee->type_hours as $type_hour)
            {
                //falta mas informacion en el type_hour
                // Log::info('inicio '.$type_hour->start_of_entry);
                // Log::info('fin '.$type_hour->end_of_entry);
                $attendance_entry = AttendanceEmployee::where('date',$year.'-'.$month.'-'.$d)
                                        // ->whereBetween('time',[$type_hour->start_of_entry, $type_hour->end_of_entry])
                                        ->where('time','>=',$type_hour->start_of_entry)
                                        ->where('time','<=',$type_hour->end_of_entry)
                                        ->where('employee_id',$employee->id)
                                        ->first();
                if($attendance_entry)
                {
                    Log::info('inicio '.$type_hour->start_of_entry);
                    Log::info('fin '.$type_hour->end_of_entry);
                    Log::info(json_encode($attendance_entry));
                    $array_start_time = explode(':',$type_hour->start_of_entry);
                    $array_tolerance_time = explode(':',$type_hour->tolerance_entry);
                    $minutes = (int) $array_start_time[1] + (int) $array_tolerance_time[1];
                    $hours = (int) $array_start_time[0] + (int) $array_tolerance_time[0];
                    if($minutes >=60)
                    {
                        $minutes -= 60;
                        $hours++;
                    }
                    $time = $hours.':'.$minutes;
                    if($attendance_entry->time >=$type_hour->start_of_entry && $attendance_entry->time <= $time)
                    {
                        $attendance_entry->state = 'success';
                    }else
                    {
                        $attendance_entry->state = 'warning';
                    }
                    array_push($attendances,$attendance_entry);
                }
                // Log::info($year.'-'.$month.'-'.$d );
                $attendance_output = AttendanceEmployee::where('date',$year.'-'.$month.'-'.$d)
                                        // ->whereBetween('time',[$type_hour->start_of_output, $type_hour->end_of_output])
                                        ->where('time','>=',$type_hour->start_of_output)
                                        ->where('time','<=',$type_hour->end_of_output)
                                        ->where('employee_id',$employee->id)
                                        ->first();
                if($attendance_output)
                {
                    Log::info('Salida '.$type_hour->start_of_output.' - '.$type_hour->end_of_output );
                    Log::info(json_encode($attendance_output));
                    $array_start_time = explode(':',$type_hour->start_of_output);
                    $array_tolerance_time = explode(':',$type_hour->tolerance_output);
                    $minutes = (int) $array_start_time[1] + (int) $array_tolerance_time[1];
                    $hours = (int) $array_start_time[0] + (int) $array_tolerance_time[0];
                    if($minutes >=60)
                    {
                        $minutes -= 60;
                        $hours++;
                    }
                    $time = $hours.':'.$minutes;
                    if($attendance_output->time >=$type_hour->start_of_output && $attendance_output->time <= $time)
                    {
                        $attendance_output->state = 'success';
                    }else
                    {
                        $attendance_output->state = 'warning';
                    }
                    array_push($attendances,$attendance_output);
                }
            }

        }
        return response()->json(compact('attendances'));
    }

    public function attendance()
    {
        $date = Carbon::now();
        $days=cal_days_in_month(CAL_GREGORIAN,$date->month , $date->year);
        $month = $date->month;
        $year = $date->year;
        $employee = Employee::find(23);
        $attendances = [];
        for ($d=1; $d <= $days ; $d++)
        {
            //buscar marcados solo para los horarios del dia XD
            foreach($employee->type_hours as $type_hour)
            {
                //falta mas informacion en el type_hour
               
                $attendance_entry = AttendanceEmployee::where('date',$year.'-'.$month.'-'.$d)
                                        // ->whereBetween('time',[$type_hour->start_of_entry, $type_hour->end_of_entry])
                                        ->where('time','>=',$type_hour->start_of_entry)
                                        ->where('time','<=',$type_hour->end_of_entry)
                                        ->where('employee_id',$employee->id)
                                        ->first();
                if($attendance_entry)
                {
                    Log::info('inicio '.$type_hour->start_of_entry);
                    Log::info('fin '.$type_hour->end_of_entry);
                    array_push($attendances,$attendance_entry);
                }
                

                $attendance_output = AttendanceEmployee::where('date',$year.'-'.$month.'-'.$d)
                                        // ->whereBetween('time',[$type_hour->start_of_output, $type_hour->end_of_output])
                                        ->where('time','>=',$type_hour->start_of_output)
                                        ->where('time   ','<=',$type_hour->end_of_output)
                                        ->where('employee_id',$employee->id)
                                        ->first();
                if($attendance_output)
                {
                    Log::info('inicio salida '.$type_hour->start_of_output);
                    Log::info('fin salida '.$type_hour->end_of_output);
                    array_push($attendances,$attendance_output);
                }
            }

        }
        return $attendances;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

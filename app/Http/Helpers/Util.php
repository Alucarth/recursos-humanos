<?php

/**
 * class Helper
 * Autor: Leandro David Torrez Salinas and Oscar Choque Huayta
 *
 */

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Holyday;
use App\AttendanceEmployee;
class Util
{
    public static function removeSpaces($text)
    {
        $re = '/\s+/';
        $subst = ' ';
        $result = preg_replace($re, $subst, $text);
        return $result ? trim($result) : null;
    }
    public static function formatMoney($value, $prefix = false)
    {
        if ($value) {
            $value = number_format($value, 2, '.', ',');
            if ($prefix) {
                return 'Bs ' . $value;
            }
            return $value;
        }
        return null;
    }
    public static function parseMoney($value)
    {
        $value = str_replace("Bs", "", $value);
        $value = str_replace(",", "", $value);
        return floatval(self::removeSpaces($value));
    }
    public static function parseBarDate($value)
    {
        if (!$value) {
            return null;
        }
        if (self::verifyBarDate($value)) {
            return Carbon::createFromFormat('d/m/Y', $value)->toDateString();
        } elseif (self::verifyDashDate($value)) {
            return $value;
        }
        return 'invalid date';
    }
    public static function verifyBarDate($value)
    {
        $re = $re = '/^\d{1,2}\/\d{1,2}\/\d{4}$/m';
        preg_match_all($re, $value, $matches, PREG_SET_ORDER, 0);
        return (sizeOf($matches) > 0);
    }
    public static function verifyDashDate($value)
    {
        $re = $re = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/m';
        preg_match_all($re, $value, $matches, PREG_SET_ORDER, 0);
        return (sizeOf($matches) > 0);
    }

    public static function parseNumber($input)
    {
        $val = str_replace(',', '', $input);
        return $val;
        // $next_val = str_replace('.', '', $input);
    }

    public static function timeString($hour)
    {
        if($hour)
        {
            $time = explode('.',$hour);
            $h = $time[0];
            $m = ((float)$time[1]/100) *60;
            return $h." horas y ".explode('.',$m)[0]." minutos.";
        }else
        {
            return '0 horas';
        }
    }

    public static function validDay($date,$type_hour)
    {

        $day = (new Carbon($date))->dayOfWeek;
        $valid = true;
        switch ($day) {
            case 1:
                # lunes
                $valid = $type_hour->monday;
                break;
            case 2:
                # martes
                $valid = $type_hour->tuesday;
            break;
            case 3:
                # miercoles
                $valid = $type_hour->wednesday;
            break;
            case 4:
                # jueves
                $valid = $type_hour->thursday;
            break;
            case 5:
                # viernes
                $valid = $type_hour->friday;
            break;
            case 6:
                # sabado
                $valid = $type_hour->saturday;
            break;
            case 7:
                # domingo
                $valid = $type_hour->sunday;
            break;

        }

        return $valid;
    }

    public static function  getAttendance($employee,$date)
    {
        $attendances = [];
        foreach($employee->type_hours as $type_hour)
        {

            // $date = Carbon::create($date)->toDateString();
            if(self::validDay($date,$type_hour))
            {

                $holyday = Holyday::where('date',$date)->first();
                $attendance = json_decode(json_encode(array('date'=>$date,
                                'entry'=> $type_hour->entry,
                                'attendance_entry' => '00:00:00',
                                'output'=> $type_hour->output,
                                'attendance_output' => '00:00:00',
                                'title_entry'=> '',
                                'title_output'=> '',
                                'delay'=> 0,
                                'hours_worked'=>0,
                                'surplus'=>0,
                                'state_entry'=>'secondary',
                                'state_output'=>'secondary')));
                //dd( $attendance->date);
                if($holyday)  //si existe la fecha festiva
                {
                    //se omite el marcado al ser feriado  XD
                    //en este caso cuenta todo el dia
                    $attendance = (object) array('date'=>$date,
                                        'entry'=> $type_hour->entry,
                                        'attendance_entry' => '00:00:00',
                                        'output'=> $type_hour->output,
                                        'attendance_output' => '00:00:00',
                                        'title_entry'=>$holyday->name,
                                        'title_output'=>$holyday->name,
                                        'delay'=> 0,
                                        'hours_worked'=>0,
                                        'surplus'=>0,
                                        'state_entry'=>'secondary',
                                        'state_output'=>'secondary');
                    array_push($attendances,$attendance);
                    // $attendance_entry = array('date'=>$date,'time'=> '00:00:00','title'=>$holyday->name,'state'=>'primary');
                }else{
                    //seteando tipo de hora entrada
                   // $attendance->entry =
                    // en caso de no encontrar fecha festiva
                    $attendance_entry = AttendanceEmployee::where('date',$date)
                                            // ->whereBetween('time',[$type_hour->start_of_entry, $type_hour->end_of_entry])
                                            ->where('time','>=',$type_hour->start_of_entry)
                                            ->where('time','<=',$type_hour->end_of_entry)
                                            ->where('employee_id',$employee->id)
                                            ->orderBy('time','ASC')
                                            ->first();
                    // Log::info(json_encode($attendance_entry));
                    if($attendance_entry)
                    {
                        $attendance->attendance_entry= $attendance_entry->time;
                        $tolerance = Carbon::parse($date.' '.$type_hour->tolerance_entry);
                        $tolerance->addSecond(59);
                        $entry_tolerance = Carbon::parse($date.' '.$type_hour->entry);
                        $entry_tolerance->addHour($tolerance->hour);
                        $entry_tolerance->addMinute($tolerance->minute);
                        $entry_tolerance->addSecond($tolerance->second);
                        $time =  $entry_tolerance->toTimeString();
                        // Log::info('Entry Tolerance :'.$time);
                        // Log::info($attendance_entry->time.' >= '.$type_hour->start_of_entry);
                        // Log::info($attendance_entry->time.' <= '.$time);
                        if($attendance_entry->time >=$type_hour->start_of_entry && $attendance_entry->time <= $time)
                        {
                            $attendance->state_entry = 'success';
                            $attendance->title_entry = 'Normal';
                            $attendance->delay = 0;
                        }else
                        {
                            $attendance->state_entry = 'warning';
                            $attendance->title_entry = 'Retraso';
                            $entry = Carbon::parse($date.' '.$attendance_entry->time);
                            $type_hour_entry= Carbon::parse($date.' '.$type_hour->entry);
                            $attendance->delay =  $type_hour_entry->diffInMinutes($entry);
                            //crear registros temporales
                        }
                        //  $attendance_entry->entry = $type_hour->entry;
                        // array_push($attendances,$attendance);
                    }else
                    {
                        $attendance->title_entry='Sin Marcado';
                        //$attendance_entry = array('date'=>$date,'time'=> '00:00:00','title'=> 'Sin Marcado','state'=>'error','entry');
                       // array_push($attendances,$attendance_entry);
                    }

                    $attendance_output = AttendanceEmployee::where('date',$date)
                                            // ->whereBetween('time',[$type_hour->start_of_output, $type_hour->end_of_output])
                                            ->where('time','>=',$type_hour->start_of_output)
                                            ->where('time','<=',$type_hour->end_of_output)
                                            ->where('employee_id',$employee->id)
                                            ->orderBy('time','ASC')
                                            ->first();
                    if($attendance_output)
                    {
                        $attendance->attendance_output= $attendance_output->time;
                        if($attendance_output->time >=$type_hour->output && $attendance_output->time <= $type_hour->end_of_output)
                        {
                            $attendance->state_output = 'success';
                            $attendance->title_output = 'Normal';
                        }else
                        {
                            $attendance->state_output = 'warning';
                            $attendance->title_output = 'Retraso';
                        }
                        // array_push($attendances,$attendance_output);
                    }else
                    {
                        $attendance->title_output = 'Sin Marcado';
                        // $attendance_entry = array('date'=>$date,'time'=> '00:00:00','title'=> 'Sin Marcado','state'=>'error');
                        // array_push($attendances,$attendance_entry);
                    }

                    //colocar exedente y horas trabajadas //
                    if($attendance->attendance_entry !='00:00:00' && $attendance->attendance_output != '00:00:00' )
                    {
                        //
                        $entry = Carbon::parse($date.' '.$attendance->attendance_entry);
                        $output = Carbon::parse($date.' '.$attendance->attendance_output);
                        $minutes_worked =  $output->diffInMinutes($entry);
                        $hours_worked = Carbon::create(0,0,0,0,0,0);
                        $hours_worked->addMinutes($minutes_worked);
                        $attendance->hours_worked = $hours_worked->toTimeString();

                        $entry_hour = Carbon::parse($date.' '.$attendance->entry);
                        $attendance->surplus = $output->diffInMinutes($entry_hour);
                    }

                    array_push($attendances,$attendance);
                }
            }

        }
        return $attendances;
    }

    public static function array_merge_array($array_income, $array_to_merge)
    {
        foreach($array_to_merge as $item)
        {
            array_push($array_income,$array_to_merge);
        }
    }

    public static function getDayString($day)
    {
        $string_day= '';
        switch ($day) {
            case '1':
                # code...
                $string_day = 'Lunes';
                break;
            case '2':
                # code...
                $string_day = 'Martes';
                break;
            case '3':
                # code...
                $string_day = 'Miercoles';
                break;
            case '4':
                # code...
                $string_day = 'Jueves';
                break;
            case '5':
                # code...
                $string_day = 'Viernes';
                break;
            case '6':
                # code...
                $string_day = 'Sabado';
                break;
            case '7':
                # code...
                $string_day = 'Domingo';
                break;
        }
        return $string_day;
    }
}

<?php

/**
 * class Helper
 * Autor: Leandro David Torrez Salinas and Oscar Choque Huayta
 *
 */

use Carbon\Carbon;

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
}

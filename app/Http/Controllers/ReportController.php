<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use App\Employee;

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

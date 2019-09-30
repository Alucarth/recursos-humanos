<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf; 
use Auth;
use App;
class ReportController extends Controller
{
    public function ficha_personal()
    {
        $title = "Reporte ";
        $storage = 'almacen isabel';
        $date = date('d-m-Y');
        $username = 'usuario prueba';
        // // $html = '<h1>Hello world</h1>';
        // return view('layouts.print', compact('username','date','title'));
        $view = \View::make('report.ficha_personal', compact('title','date','username','storage'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        //$pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0); //SETTEANDO LANDSCAPE HORIZONTAL
        return $pdf->inline();    }
}

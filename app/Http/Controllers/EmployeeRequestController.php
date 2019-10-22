<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Approve;
use App\Position;
use App\Management;
use App\Unity;

class EmployeeRequestController extends Controller
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
        $employee_requests = EmployeeRequest::with('request_type','approves')->where('employee_approve_id',$employee->id)->where('employee_id','!=',$employee->id)->orderBy('id','Desc')->get();
        return response()->json(compact('employee','employee_requests'));
    }
    public function index_employee()
    {
        $employee = Auth::user()->employee;
        $employee_requests = EmployeeRequest::with('request_type','approves')->where('employee_id',$employee->id)->orderBy('id','Desc')->get();
        return response()->json(compact('employee','employee_requests'));
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
        // return $request->all();
        if($request->has('id'))
        {
            $employee_request = EmployeeRequest::find($request->id);
        }else
        {
            $employee_request = new EmployeeRequest;
        }
        $employee_request->date = $request->date;
        $employee_request->hour_in = $request->hour_in;
        $employee_request->hour_out = $request->hour_out;
        $employee_request->reason = $request->reason;
        $employee_request->request_type_id = $request->request_type['id'];
        $employee_request->destiny_place = $request->destiny_place;
        $employee_request->employee_id = Auth::user()->employee->id;//$request->employee_id;
        $employee_request->employee_approve_id = $request->employee_id; // quien tiene la boleta

        if($request->has("value1"))
        {
            $employee_request->value1 = $request->value1;
        }
        if($request->has("value2"))
        {
            $employee_request->value2 = $request->value2;
        }
        if($request->has("value3"))
        {
            $employee_request->value3 = $request->value3;
        }
        if($request->has("value4"))
        {
            $employee_request->value4 = $request->value4;
        }
        if($request->has("value5"))
        {
            $employee_request->value5 = $request->value5;
        }
        $employee_request->save();
        //hasta aqui lo de la boleta
        $approves = Approve::where('employee_request_id',$employee_request->id)->get();
        if(!$approves->count()>0)
        {
            $position = Position::find(Auth::user()->employee->position->id);
            $rrhh_position = Position::where('name','Responsable de Recursos Humanos')->first();
            $approve = new Approve;
            $approve->employee_request_id = $employee_request->id;
            $approve->position_id = $rrhh_position->id;
            $approve->state = 'Pendiente';
            $approve->date = Carbon::now();
            $approve->save();
            // if($position->type_dependency == 'Unidad')
            // {
            //    $first_position  = Position::where('type_dependency','Gerencia')->where('unit_id',$position->unit_id)->first();
            //    $approve = new Approve;
            //    $approve->employee_request_id = $employee_request->id;
            //    $approve->position_id = $first_position->id;
            //    $approve->state = 'Pendiente';
            //    $approve->date = Carbon::now();
            //    $approve->save();

            //    $second_postion =  Position::where('type_dependency','Gerencia Ejecutiva')->where('managament_id',$position->unity->management->id)->first();
            //    $approve = new Approve;
            //    $approve->employee_request_id = $employee_request->id;
            //    $approve->position_id = $second_postion->id;
            //    $approve->state = 'Pendiente';
            //    $approve->date = Carbon::now();
            //    $approve->save();

            //    $rrhh_position = Position::where('name','Responsable de Recursos Humanos')->first();
            //    $approve = new Approve;
            //    $approve->employee_request_id = $employee_request->id;
            //    $approve->position_id = $rrhh_position->id;
            //    $approve->state = 'Pendiente';
            //    $approve->date = Carbon::now();
            //    $approve->save();

            // }
        }
        //



        $name = $employee_request->date;



        return response()->json(compact('name'));

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
        $employee_request = EmployeeRequest::with('approves')->find($id);
        return response()->json(compact('employee_request'));
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
        $employee_request = EmployeeRequest::with('request_type','employee')->find($id);
        return response()->json(compact('employee_request'));
    }

    public function send($employee_request_id)
    {
        $employee_request = EmployeeRequest::find($employee_request_id);
        $approve = Approve::where('employee_request_id',$employee_request->id)->where('state','Pendiente')->first();

        $employee = Employee::where('position_id',$approve->position_id)->first();
        if($employee)
        {
            $employee_request->employee_approve_id = $employee->id;
            $employee_request->save();
            $status = 'success';
            $message = 'Solicitud Enviada';
            return response()->json(compact('status','message'));
        }else
        {
            $status = 'error';
            $message = 'No se puso enviar la solicitud';
            return response()->json(compact('status','message'));
        }

        return $employee_request;
    }

    public function approve(Request $request)
    {
        $employee = Employee::where('id',Auth::user()->employee->id)->first();
        // return $employee->p;
        $approve = Approve::where('employee_request_id',$request->id)->where('position_id',$employee->position->id)->first();
        if($approve)
        {
            $approve->state = $request->approve_state;
            $approve->save();

            $status = 'success';
            $message = 'Solicitud Enviada';
            return response()->json(compact('status','message'));
        }else
        {
            $status = 'error';
            $message = 'No se puso enviar la solicitud';
            return response()->json(compact('status','message'));
        }
        // return $request->all();
        // $employee = EmployeeRequest::find();
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


        $employee_request = EmployeeRequest::find($id);
        $approves = Approve::where('employee_request_id',$employee_request->id)->get();
        foreach($approves as $approve)
        {
            $approve->delete();
        }
        $name = $employee_request->date;
        $employee_request->delete();
        return response()->json(compact('name'));
    }
}

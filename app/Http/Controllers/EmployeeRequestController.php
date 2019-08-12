<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
    }
    public function index_employee(){
        $employee = Auth::user()->employee;
        $employee_requests = EmployeeRequest::where('employee_id',$employee->id)->get();
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
        $employee_request->type = $request->type;
        $employee_request->destiny_place = $request->destiny_place;
        $employee_request->employee_id = $request->employee_id;
        $employee_request->save();
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
        $employee_request = EmployeeRequest::find($id);
        return response()->json(compact('employee_request'));
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
        $name = $employee_request->date;
        $employee_request->delete();
        return response()->json(compact('name'));
    }
}

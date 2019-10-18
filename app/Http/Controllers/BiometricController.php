<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biometric;
// use App\zklib\zklib;
use App\Employee;
use ZKLib;
use App\AttendanceEmployee;
class BiometricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $biometrics = Biometric::all();
        return response()->json(compact('biometrics'));
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
            $biometric = Biometric::find($request->id);
        }else {
            $biometric = new Biometric;
        }
        $biometric->name = $request->name;
        $biometric->address = $request->address;
        $biometric->ip = $request->ip;
        $biometric->port = $request->port;
        $biometric->save();

        return response()->json(compact('biometric'));
    }

    public function sync(Request $request)
    {
        $biometric = Biometric::find($request->id);
        $zk = new ZKLib($biometric->ip, $biometric->port);
        // $zk = new ZKLib("172.16.1.234", 4370);
        $ret = $zk->connect();
        $attendances = $zk->getAttendance();
        $sync_count = 0;
        foreach($attendances as $attendance)
        {
            $employee = Employee::where('biometric_code',$attendance[1])->first();
            if($employee)
            {
                $date =  date( "Y-m-d", strtotime( $attendance[3] ) );
                $time = date( "H:i:s", strtotime( $attendance[3] ) );
                $attendance_employee = AttendanceEmployee::where('date',$date)->where('time',$time)->where('employee_id',$employee->id)->first();

                if(!$attendance_employee)
                {
                    $attendance_employee = new AttendanceEmployee;
                    $attendance_employee->employee_id = $employee->id;
                    $attendance_employee->biometric_id = $biometric->id;
                    $attendance_employee->biometric_code = $attendance[1];
                    $attendance_employee->date = $date;
                    $attendance_employee->time = $time;
                    $attendance_employee->delayed = "00:00:00";
                    $attendance_employee->save();
                    $sync_count++;
                }
            }
        }

        return response()->json(compact('biometric','attendance','sync_count'));

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

    public function getInfo($biometric_id)
    {
        $biometric = Biometric::find($biometric_id);
        $zk = new ZKLib($biometric->ip, $biometric->port);
        // $zk = new ZKLib("172.16.1.234", 4370);
        $ret = $zk->connect();
        $name = $zk->deviceName();
        $time = $zk->getTime();
        return response()->json(compact('name','time'));
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
        $biometric = Biometric::find($id);

        return response()->json(compact('biometric'));
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
        $biometric = Biometric::find($id);
        $name = $biometric->name;
        $biometric->delete();
        return response()->json(compact('name'));
    }
}

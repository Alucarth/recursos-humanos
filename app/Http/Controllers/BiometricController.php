<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biometric;
// use App\zklib\zklib;
use ZKLib;
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
        $attendance = $zk->getAttendance();
        return response()->json(compact('biometric','attendance'));
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

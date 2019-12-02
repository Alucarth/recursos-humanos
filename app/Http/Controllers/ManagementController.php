<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management;
use App\Employee;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $magements = Management::all();
        return response()->json($magements);
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

    public function employees($management_id)
    {
        if($management_id==0)
        {
            $employees = Employee::with('management')->get();
        }else{
            $employees = Employee::with('management')->where('management_id',$management_id)->get();
        }
        return response()->json(compact('employees'));
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
        if($request->has('id')){
            $management = Management::find($request->id);
        }else{

            $management = new Management;
        }
        $management->name = $request->name;
        // $management->description = $request->description;
        $management->save();

        return $management;
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
        $management = Management::find($id);
        return response()->json(compact('management'));
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
        $management = Management::find($id);
        $name = $management->name;
        $management->delete();
        return response()->json(compact('name'));
    }
}

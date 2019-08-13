<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positions = Position::all();
        return response()->json($positions);
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
        if($request->has('id')){
            $position = Position::find($request->id);
        }else{

            $position = new Position;
        }
        $position->name = $request->name;
        // $position->description = $request->description;
        $position->type_dependency = $request->type_dependency;
        if($request->has('unit_id')){
            $position->unit_id = $request->unit_id;
        }else{
            $position->unit_id = null;
        }
        if($request->has('managament_id')){
            $position->managament_id = $request->managament_id;
        }else
        {
            $position->managament_id = null;
        }
        $position->save();

        return $position;
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
        $position = Position::find($id);
        return response()->json($position);
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
        $position = Position::find($id);
        $name = $position->name;
        $position->delete();
        return response()->json(compact('name'));
    }
}

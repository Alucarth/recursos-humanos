<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicTraining;
class AcademicTrainingController extends Controller
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
            $academic_training = AcademicTraining::find($request->id);
        }
        else{
            $academic_training = new AcademicTraining;
        }
        $academic_training->employee_id = $request->employee_id;
        $academic_training->date = $request->date;
        $academic_training->document = $request->document;
        $academic_training->grade = $request->grade;
        $academic_training->has_title = $request->has_title;
        $academic_training->instituion = $request->instituion;
        $academic_training->name = $request->name;
        $academic_training->state = $request->state;
        if ($request->hasFile('file')) {

            $academic_training->file_path = $request->file('file')->store('public/academic_trainings');
        }
        $academic_training->save();
        return response()->json(compact('academic_training'));
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
        $academic_training = AcademicTraining::find($id);
        return response()->json(compact('academic_training'));
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
        $academic_training =AcademicTraining::find($id);
        $name = $academic_training->name;
        $academic_training->delete();
        return response()->json(compact('name'));

    }
}

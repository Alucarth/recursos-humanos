<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Auth;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::with('position','city_identity_card','contribution')->get();
        return response()->json($employees);
    }

    public function info()
    {
        $employee = Employee::with('position','management','families')->find(Auth::user()->employee->id);
        return response()->json(compact('employee'));
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
        if($request->has("id"))
        {
            $employee = Employee::find($request->id);
        }else {
            $employee = new Employee;
        }

        $employee->first_name = $request->first_name;
        $employee->second_name = $request->second_name;
        $employee->last_name = $request->last_name;
        $employee->mother_last_name = $request->mother_last_name;
        $employee->biometric_code = $request->biometric_code;
        $employee->identity_card = $request->identity_card;
        $employee->birth_date = $request->birth_date;
        $employee->cellphone = $request->cellphone;
        $employee->city_identity_card_id = $request->city_identity_card_id;
        $employee->civil_status = $request->civil_status;
        $employee->contract_type_id = $request->contract_type_id;
        $employee->contract_modality_id = $request->contract_modality_id;
        $employee->contribution_id = $request->contribution_id;   //adicionar la contribucion en la tabla XD
        $employee->country_id = $request->country_id;
        $employee->cua_nua = $request->cua_nua;
        $employee->disability = $request->disability;
        $employee->document_type_id = $request->document_type_id;
        $employee->entry_date = $request->entry_date;
        $employee->gender = $request->gender; //revisar el tipo de dato
        $employee->management_id = $request->management_id;
        $employee->phone = $request->phone;
        $employee->position_id = $request->position_id;
        $employee->profession = $request->profession;
        $employee->reason = $request->reason;
        $employee->salary = $request->salary; //revisar el tipo de dato
        $employee->tutor = $request->tutor;
        $employee->retirement_date = $request->retirement_date;
        $employee->unit_id = $request->unit_id;

        if ($request->hasFile('curriculum_file')) {
            //
            $employee->path_curriculum = $request->file('curriculum_file')->store('public/curriculums');
        }

        if ($request->hasFile('image_file')) {
            //
            $employee->employee_image_path = $request->file('image_file')->store('public/employee_images');
        }

        $employee->save();

        //
        // return $request->all();
        // if ($request->hasFile('curriculum_file')) {
        //     //
        //     $file = "existe el archivo";
        //     return response()->json(compact('file'));
        // }
        return $employee;
        return $request->all();
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
        $employee = Employee::with('contribution')->find($id);
        return response()->json(compact('employee'));
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
    }
}

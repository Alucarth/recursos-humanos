<?php

namespace App\Http\Controllers;

use App\AcademicTraining;
use Illuminate\Http\Request;
use App\Employee;
use App\Family;
use App\Course;
use App\Language;
use App\Package;
use App\WorkExperience;
use Auth;
use Log;
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
        $employee = Employee::with('position','management','families','academic_trainings','courses','languages','packages','country','contribution','health_box','works')->find(Auth::user()->employee->id);
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

    public function enabled(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->user_edit = $request->user_edit;
        $employee->save();
        return response()->json(compact('employee'));
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
        $employee = Employee::with('contribution','country')->find($id);
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

    public function save_employee(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->first_name = $request->first_name;
        $employee->second_name = $request->second_name;
        $employee->last_name = $request->last_name;
        $employee->mother_last_name = $request->mother_last_name;
        $employee->identity_card = $request->identity_card;
        $employee->city_identity_card_id = $request->city_identity_card_id;
        $employee->birth_date = $request->birth_date;
        $employee->country_id = $request->country_id;
        $employee->civil_status = $request->civil_status;
        $employee->gender = $request->gender;
        $employee->has_military_card = $request->has_military_card;
        $employee->military_serial_number = $request->military_serial_number;
        $employee->disability = $request->disability;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->cellphone = $request->cellphone;
        $employee->corporate_cell = $request->corporate_cell;
        $employee->corporate_email = $request->corporate_email;
        $employee->personal_email = $request->personal_email;


        //guardando datos referenciales
        $employee->contribution_id = $request->contribution_id;
        $employee->cua_nua = $request->cua_nua;
        $employee->bank = $request->bank;
        $employee->account_number = $request->account_number;
        $employee->healh_box_id = $request->healh_box_id;
        $employee->registration_number_medical = $request->registration_number_medical;
        $employee->blood_type = $request->blood_type;
        $employee->doctor_name = $request->doctor_name;
        $employee->number_dependency = $request->number_dependency;
        $employee->sworn_declaration = $request->sworn_declaration;
        $employee->date_sworn_declaration = $request->date_sworn_declaration;
        $employee->date_reception = $request->date_reception;
        $employee->number_declaration = $request->number_declaration;
        //tallas
        $employee->blouses = $request->blouses;
        $employee->shirt = $request->shirt;
        $employee->t_shirt = $request->t_shirt;
        $employee->jacket = $request->jacket;
        $employee->boots_number = $request->boots_number;

        $employee->user_edit = false;
        $employee->save();
        //guardando families
        Log::info('iterando ');
        //adicionar logica de borrado para cuando se tenga que hacer modificaciones a esto XD
        $families = Family::where('employee_id',$employee->id)->get();
        foreach($families as $family){
            $family->delete();
        }

        foreach($request->families as $a_family)
        {
            $item = (object) $a_family;
            $family = new Family;
            $family->employee_id = $employee->id;
            $family->first_name = $item->first_name??'';
            $family->second_name = $item->second_name??'';
            $family->last_name = $item->last_name??'';
            $family->mother_last_name = $item->mother_last_name??'';
            $family->kinship_id = $item->kinship_id;
            $family->age = $item->age;
            $family->birth_date = $item->birth_date;
            $family->phone = $item->phone;
            $family->cellphone = $item->cellphone;
            $family->is_reference = $item->is_reference;
            $family->healh_box_id = $item->healh_box_id;
            $family->number_healt_box = $item->number_healt_box;
            $family->has_vaccine = $item->has_vaccine;
            $family->save();

            Log::info($item->first_name);
        }

          //adicionar logica de borrado para cuando se tenga que hacer modificaciones a esto XD
          $academics = AcademicTraining::where('employee_id',$employee->id)->get();
          foreach($academics as $academic){
              $academic->delete();
          }

        //registrando formacion academica
        foreach($request->academic_trainings as $a_academic)
        {
            $item = (object) $a_academic;
            $academic = new AcademicTraining;
            $academic->employee_id = $employee->id;
            $academic->name = $item->name;
            $academic->document = $item->document;
            $academic->state = $item->state;
            $academic->instituion = $item->instituion;
            $academic->grade = $item->grade;
            $academic->has_title = $item->has_title;
            $academic->date = $item->date;
            $academic->save();
            // Log::info($item->first_name);
        }

        $courses = Course::where('employee_id',$employee->id)->get();
        foreach($courses as $course){
            $course->delete();
        }

        foreach($request->courses as $a_course)
        {
            $item = (object) $a_course;
            $course = new Course;
            $course->employee_id = $employee->id;
            $course->name = $item->name;
            $course->institution = $item->institution;
            $course->hours = $item->hours;
            $course->date = $item->date;
            $course->save();
            // Log::info($item->first_name);
        }

        $languages = Language::where('employee_id',$employee->id)->get();
        foreach($languages as $language){
            $language->delete();
        }


        foreach($request->languages as $a_language)
        {
            $item = (object) $a_language;
            $language = new Language;
            $language->employee_id = $employee->id;
            $language->name = $item->name;
            $language->institution = $item->institution;
            $language->date = $item->date;
            $language->save();
            // Log::info($item->first_name);
        }

        $works = WorkExperience::where('employee_id',$employee->id)->get();
        foreach($works as $work){
            $work->delete();
        }

        foreach($request->works as $a_work)
        {
            $item = (object) $a_work;
            $work = new WorkExperience;
            $work->employee_id = $employee->id;
            $work->position = $item->position;
            $work->phone = $item->phone;
            $work->institution = $item->institution;
            $work->date = $item->date;
            $work->save();
            // Log::info($item->first_name);
        }

        $packages = Package::where('employee_id',$employee->id)->get();
        foreach($packages as $package){
            $package->delete();
        }

        foreach($request->packages as $a_package)
        {
            $item = (object) $a_package;
            $package = new Package;
            $package->employee_id = $employee->id;
            $package->name = $item->name;
            $package->institution = $item->institution;
            $package->date = $item->date;
            $package->save();
            // Log::info($item->first_name);
        }
        $employee = Employee::with('position','management','families','academic_trainings','courses','languages','packages','country','contribution','health_box','works')->find(Auth::user()->employee->id);
        return response()->json(compact('employee'));
        // return $request->all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContractType;
class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contract_types = ContractType::all();
        return response()->json($contract_types);
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
            $contract_type = ContractType::find($request->id);
        }else{

            $contract_type = new ContractType;
        }
        $contract_type->name = $request->name;
        // $contract_type->shortened = $request->shortened;
        $contract_type->save();

        return $contract_type;
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
        $contract_type = ContractType::find($id);
        return response()->json(compact('contract_type'));
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
        $contract_type = ContractType::find($id);
        $name = $contract_type->name;
        $contract_type->delete();
        return response()->json(compact('name'));
    }
}

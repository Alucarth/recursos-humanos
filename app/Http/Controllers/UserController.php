<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = $users = User::with('employee')->permission('RRHH')->orderBy('usr_usuario','ASC')->get();
        return response()->json(compact('users'));
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

    public function roles()
    {
        $permission = Permission::find(7);// Recursos Humanos
        $rs = $permission->roles;
        // return $rs;
        $roles = [];
        foreach ($rs as $r) {
            # code...
            if($r->name != 'Super Administrador')
            {
                array_push($roles,$r);
            }
        }

        return response()->json(compact('roles'));
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
        $user = User::with('roles')->where('usr_id',$request->usr_id)->first();
        $roles = json_decode( json_encode($request->roles_assignados));
        $roles_array= [];
        foreach ($roles as $role) {
            # code...
            if(isset($role->selected))
            {
                if($role->selected)
                {
                    array_push($roles_array,$role->name);
                }
            }
        }
        $user->syncRoles($roles_array);
        return response()->json(compact('user'));
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
        $user = User::with('employee')->where('usr_id',$id)->first();

        $permission = Permission::find(7);// Recursos Humanos
        $rs = $permission->roles;
        // return $rs;
        $roles = [];
        foreach ($rs as $r) {
            # code...
            if($r->name != 'Super Administrador')
            {
                array_push($roles,$r);
            }
        }

        foreach ($roles as $role) {
            # code...

            if($user->hasRole($role->name))
            {
                $role->selected =true;
            }
        }
        $user->roles_assignados = $roles;

        return response()->json(compact('user'));
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

<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'public._bp_usuarios';
    protected $primaryKey = "usr_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee','usr_prs_id','id')->with('management');
    }

    public function permissions()
    {
        $roles = [];

        // $roles = DB::table('public.model_has_roles')
        //             ->join('public.roles','public.roles.id','=','public.model_has_roles.role_id')
        //             ->where('public.model_has_roles.model_id','=',$this->usr_id)
        //             ->select('public.roles.*')
        //             ->get();
        $roles = DB::table('public.model_has_roles')
                    ->join('public.roles','public.roles.id','=','public.model_has_roles.role_id')
                    // ->join('public.role_has_permissions','public.role_has_permissions.role_id','=','public.model_has_roles.role_id')
                    ->where('public.model_has_roles.model_id','=', $this->usr_id)
                    // ->where('public.role_has_permissions.permission_id','=',7)
                    ->select('public.roles.id','public.roles.name')
                    ->get();

        return $roles;
    }
}

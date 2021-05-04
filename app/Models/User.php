<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){

    }
    public function has_role($title)
    {
        $user_id = Auth::user()->id;
        $get_role = Role::where('name', $title)->first();
        return DB::table('user_roles')
            ->leftJoin('roles', 'user_roles.role_id', '=', 'roles.id')
            ->where('roles.privilege', '>=', $get_role->privilege)
            ->first();

    }
    public function make_employed($title)
    {
        $assigned_roles = array();
        switch ($title) {
            case "admin" :
               $user =  User::find(Auth::user()->id);
                $user->isAdmin = 1;
        }
    }
}

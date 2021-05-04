<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function authorization(){
//        dd(Auth::user());
        return view('users.authorization');
    }

    public function registration(){
        return view('users.authorization');
    }
    public function auth(Request $request){
//        dd($request->name);
        $user = new User;
        $user->name = 2;
        $user->save();
//        return back();
    }
    public function register(Request $request){
        $user = new User;
        $user->name = 2;
        $user->email = 2;
        $user->password = 2;
        $user->save();
        dd($request->login);
//        return back();
    }
}

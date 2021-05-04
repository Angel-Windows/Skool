<?php

namespace App\Http\Controllers;

use App\Models\user_profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = user_profiles::where('user_id', Auth::user()->id)->first();
        return view('home')
            ->with('user', $user);
    }
    public function home(){
        return view('home.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use App\Models\user_profiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $data = [];
        $date = Carbon::now();
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d');
            $query = Lessons::where('date', "LIKE", $date . "%")->get();
            if ($query->first() != null) {
                $data[] = $query;
            }
        }
        $user = user_profiles::where('user_id', Auth::user()->id)->first();
        return view('calendar.index')
            ->with('date', $date)
            ->with('data', $data)
            ->with('user', $user);
    }

    public function lesson(Request $request, $page = 0)
    {
        $data = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($page);
            $date_today = Carbon::now();
            $query = Lessons::where('date', "LIKE", $date->format('Y-m-d') . "%")->get();
            if ($query->first() != null) {
                $data[] = $query;
            }
        }
        $user = user_profiles::where('user_id', Auth::user()->id)->first();
        return view('calendar.calendar')
            ->with('date', $date)
            ->with('date_today', $date_today)
            ->with('page', $page)
            ->with('user', $user)
            ->with('data', $data);
    }
}

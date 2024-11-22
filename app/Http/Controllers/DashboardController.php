<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->format('l');

        $schedules = Schedule::where('day', $today)
                             ->with('course')
                             ->get();

        $courses = Course::all();
        $lecturers = Lecturer::all();

        return view('dashboard.index', compact('schedules', 'courses', 'lecturers'));
    }
}

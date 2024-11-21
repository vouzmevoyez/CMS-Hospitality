<?php

use App\Http\Controllers\DashboardController;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Material;
use App\Models\Schedule;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('materials', MaterialController::class);
// Route::resource('dashboard', DashboardController::class);
// Route::get('/dashboard/schedules', [DashboardController::class, 'schedules']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    // Get the current day (today)
    $today = Carbon::today()->format('l');

    // Fetch schedules for today
    $schedules = Schedule::where('day', $today)
                            ->with('course', 'material') // Eager load the associated course and material for schedules
                            ->get();

    // Fetch all other data
    $courses = Course::all(); // Get all courses
    $lecturers = Lecturer::all(); // Get all lecturers

    // Pass the data to the view
    return view('dashboard.index', compact('schedules', 'courses', 'lecturers'));
})->name('dashboard');

Route::get('/dashboard/schedules', function () {
    $schedules = Schedule::all();
    return view('dashboard.schedule.index', compact('schedules'));
});

Route::get('/dashboard/courses', function () {
    $courses = Course::all();
    return view('dashboard.course.index', compact('courses'));
});

Route::get('/dashboard/lecturers', function () {
    $lecturers = Lecturer::all();
    return view('dashboard.lecturer.index', compact('lecturers'));
});


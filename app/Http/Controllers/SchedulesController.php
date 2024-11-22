<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Status;
use App\Models\Classes;
use App\Models\Lecturer;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('dashboard.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $statuses = Status::all();
        $classes = Classes::all();

        return view('dashboard.schedule.create', compact('courses', 'lecturers', 'statuses', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'status_id' => 'required|exists:statuses,id',
            'class_id' => 'required|exists:classes,id',
            'day' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'room' => 'required|string|max:50',
        ]);

        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified schedule.
     */
    public function show(Schedule $schedule)
    {
        return view('dashboard.schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified schedule.
     */
    public function edit(Schedule $schedule)
    {
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $statuses = Status::all();
        $classes = Classes::all();

        return view('dashboard.schedule.edit', compact('schedule', 'courses', 'lecturers', 'statuses', 'classes'));
    }

    /**
     * Update the specified schedule in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'lecturer_id' => 'nullable|exists:lecturers,id',
            'status_id' => 'nullable|exists:statuses,id',
            'class_id' => 'nullable|exists:classes,id',
            'day' => 'nullable|string|max:20',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'room' => 'nullable|string|max:50',
        ]);

        $schedule->update($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified schedule from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}

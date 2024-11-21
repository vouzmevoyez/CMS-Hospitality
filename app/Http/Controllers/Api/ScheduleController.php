<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    // Tampilkan semua jadwal
    public function index()
    {
        $schedules = Schedule::with(['course', 'lecturer'])->get();

        return response()->json([
            'success' => true,
            'data' => $schedules
        ]);
    }

    // Tampilkan detail jadwal berdasarkan ID
    public function show($id)
    {
        $schedule = Schedule::with(['course', 'lecturer'])->find($id);

        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Schedule not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $schedule
        ]);
    }

    // Tambah jadwal baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'status_id' => 'required|exists:statuses,id',
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'room' => 'required|string',
        ]);

        $schedule = Schedule::create($validated);

        return response()->json([
            'success' => true,
            'data' => $schedule
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Find the schedule by ID
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Schedule not found'
            ], 404);
        }

        // Validate the incoming request
        $validated = $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'lecturer_id' => 'nullable|exists:lecturers,id',
            'status_id' => 'nullable|exists:statuses,id',
            'day' => 'nullable|string',
            'start_time' => 'nullable|date_format:H:i:s',
            'end_time' => 'nullable|date_format:H:i:s',
            'room' => 'nullable|string',
            'material_id' => 'nullable|exists:materials,id',
            'is_uploaded' => 'nullable|boolean',
        ]);

        // Update the schedule with validated data
        $schedule->update($validated);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Schedule updated successfully',
                'data' => $schedule
            ]);
        }

        // Redirect to dashboard with success message
        return redirect()->route('dashboard')->with('success', 'Schedule updated successfully!');
    }

    // Hapus jadwal berdasarkan ID
    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Schedule not found'
            ], 404);
        }

        $schedule->delete();

        return response()->json([
            'success' => true,
            'message' => 'Schedule deleted successfully'
        ]);
    }
}

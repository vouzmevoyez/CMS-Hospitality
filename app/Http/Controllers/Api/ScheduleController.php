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
            'course_id' => 'nullable|exists:courses,id', // Allow updating course_id
            'lecturer_id' => 'nullable|exists:lecturers,id', // Allow updating lecturer_id
            'day' => 'nullable|string', // Allow updating day
            'start_time' => 'nullable|date_format:H:i:s', // Allow updating start_time
            'end_time' => 'nullable|date_format:H:i:s', // Allow updating end_time
            'room' => 'nullable|string', // Allow updating room
            'material_id' => 'nullable|exists:materials,id', // Allow updating material_id
            'is_uploaded' => 'nullable|boolean', // Allow updating is_uploaded
        ]);

        // Update the schedule with validated data
        // $schedule->update($validated);

        dd($validated);

        // Return success response with updated schedule data
        return response()->json([
            'success' => true,
            'message' => 'Schedule updated successfully',
            'data' => $schedule
        ]);
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

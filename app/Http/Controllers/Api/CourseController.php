<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    // Tampilkan semua mata kuliah
    public function index()
    {
        $courses = Course::all();

        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }

    // Tampilkan detail mata kuliah berdasarkan ID
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $course
        ]);
    }

    // Tambah mata kuliah baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:courses,code',
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'success' => true,
            'data' => $course
        ], 201);
    }

    // Update mata kuliah berdasarkan ID
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $validated = $request->validate([
            'code' => 'sometimes|string|unique:courses,code,' . $id,
            'name' => 'sometimes|string',
            'description' => 'nullable|string',
        ]);

        $course->update($validated);

        return response()->json([
            'success' => true,
            'data' => $course
        ]);
    }

    // Hapus mata kuliah berdasarkan ID
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully'
        ]);
    }
}

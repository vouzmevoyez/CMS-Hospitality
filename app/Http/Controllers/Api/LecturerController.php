<?php

namespace App\Http\Controllers\Api;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    // Tampilkan semua dosen
    public function index()
    {
        $lecturers = Lecturer::all();

        return response()->json([
            'success' => true,
            'data' => $lecturers
        ]);
    }

    // Tampilkan detail dosen berdasarkan ID
    public function show($id)
    {
        $lecturer = Lecturer::find($id);

        if (!$lecturer) {
            return response()->json([
                'success' => false,
                'message' => 'Lecturer not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $lecturer
        ]);
    }

    // Tambah dosen baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:lecturers,email',
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        $lecturer = Lecturer::create($validated);

        return response()->json([
            'success' => true,
            'data' => $lecturer
        ], 201);
    }

    // Update dosen berdasarkan ID
    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::find($id);

        if (!$lecturer) {
            return response()->json([
                'success' => false,
                'message' => 'Lecturer not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:lecturers,email,' . $id,
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        $lecturer->update($validated);

        return response()->json([
            'success' => true,
            'data' => $lecturer
        ]);
    }

    // Hapus dosen berdasarkan ID
    public function destroy($id)
    {
        $lecturer = Lecturer::find($id);

        if (!$lecturer) {
            return response()->json([
                'success' => false,
                'message' => 'Lecturer not found'
            ], 404);
        }

        $lecturer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lecturer deleted successfully'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Material;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::findOrFail($id);  // Get the material by ID
        return view('materials.edit', compact('material'));  // Pass material to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input
        $validated = $request->validate([
            'material' => 'nullable|file|mimes:pdf,docx,pptx,txt|max:10240', // Validate the uploaded file
            'course_id' => 'required|exists:courses,id', // Validate course ID
            'lecturer_id' => 'required|exists:lecturers,id', // Validate lecturer ID
        ]);

        // Find the material by ID
        $material = Material::findOrFail($id);

        // If a new file is uploaded, handle the upload
        if ($request->hasFile('material')) {
            // Delete the old file from storage
            Storage::disk('public')->delete($material->file_path);

            // Upload the new file
            $file = $request->file('material');
            $filePath = $file->store('materials', 'public');

            $material->file_path = $filePath;
            $material->file_name = $file->getClientOriginalName();
        }

        // Update other fields
        $material->lecturer_id = $request->lecturer_id;
        $material->course_id = $request->course_id;

        // Save the updated material
        $material->save();

        // Redirect back with success message
        return redirect()->route('materials.index')->with('success', 'Material updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

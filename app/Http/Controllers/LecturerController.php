<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('dashboard.lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.lecturer.create'); // Pastikan ada view untuk form input
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email',
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        // Menyimpan data dosen
        Lecturer::create($validated);

        return redirect()->route('lecturers.index'); // Kembali ke halaman daftar dosen
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lecturer = Lecturer::findOrFail($id); // Mendapatkan data dosen berdasarkan ID
        return view('dashboard.lecturer.show', compact('lecturer')); // Tampilkan detail dosen
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lecturer = Lecturer::findOrFail($id); // Mendapatkan data dosen berdasarkan ID
        return view('dashboard.lecturer.edit', compact('lecturer')); // Tampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email,' . $id,
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        $lecturer = Lecturer::findOrFail($id); // Mendapatkan data dosen berdasarkan ID
        $lecturer->update($validated); // Update data dosen

        return redirect()->route('lecturers.index'); // Kembali ke halaman daftar dosen
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lecturer = Lecturer::findOrFail($id); // Mendapatkan data dosen berdasarkan ID
        $lecturer->delete(); // Hapus data dosen

        return redirect()->route('lecturers.index'); // Kembali ke halaman daftar dosen
    }
}

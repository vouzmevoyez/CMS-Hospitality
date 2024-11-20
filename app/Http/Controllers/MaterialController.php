<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua materi yang terkait dengan kursus tertentu
        $materials = Material::all(); // Anda bisa menambahkan query sesuai kebutuhan
        return view('materials.index', compact('materials')); // Ganti 'materials.index' dengan view Anda
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all(); // Ambil semua data kursus
        $lecturers = Lecturer::all(); // Ambil semua data dosen
        return view('materials.create', compact('courses', 'lecturers')); // Kirim ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi file upload
        $validated = $request->validate([
            'material' => 'required|file|mimes:pdf,docx,pptx|max:10240', // Hanya menerima file PDF, DOCX, PPTX, ukuran maksimal 10MB
            'course_id' => 'required|exists:courses,id', // Validasi course_id
            'lecturer_id' => 'required|exists:lecturers,id', // Validasi lecturer_id
            'schedule_id' => 'required|exists:schedules,id', // Validasi lecturer_id
        ]);

        // Mendapatkan file yang diunggah
        $file = $request->file('material');

        // Menentukan nama file yang akan disimpan (gunakan nama unik untuk menghindari nama file yang duplikat)
        $fileName = time() . '-' . $file->getClientOriginalName();

        // Menyimpan file di folder 'materials' pada disk public
        $path = $file->storeAs('materials', $fileName, 'public'); // Menyimpan file di storage/app/public/materials

        // Simpan data ke dalam tabel 'materials'
        $material = new Material();
        $material->file_path = $path; // Menyimpan path relatif yang dapat diakses
        $material->file_name = $fileName; // Menyimpan nama file
        $material->course_id = $request->course_id;
        $material->lecturer_id = $request->lecturer_id;
        $material->schedule_id = $request->schedule_id;
        $material->is_uploaded = true; // Menandakan file sudah diupload
        $material->save(); // Simpan ke database

        return redirect()->route('materials.index')->with('success', 'Materi berhasil diupload'); // Redirect dengan pesan sukses
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail materi berdasarkan ID
        $material = Material::findOrFail($id);
        return view('materials.show', compact('material')); // Ganti 'materials.show' dengan view Anda
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit materi
        $material = Material::findOrFail($id);
        return view('materials.edit', compact('material')); // Ganti 'materials.edit' dengan view Anda
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'material' => 'nullable|file|mimes:pdf,docx,pptx,txt|max:10240', // Validasi file yang diunggah
            'course_id' => 'required|exists:courses,id', // Validasi ID kursus
            'lecturer_id' => 'required|exists:lecturers,id', // Validasi ID dosen
        ]);

        // Temukan materi berdasarkan ID
        $material = Material::findOrFail($id);

        // Jika file baru diunggah, simpan dan perbarui path-nya
        if ($request->hasFile('material')) {
            // Hapus file lama jika ada
            Storage::disk('public')->delete($material->file_path);

            // Mengunggah file baru
            $file = $request->file('material');
            $filePath = $file->store('materials', 'public'); // Menyimpan file di storage 'public'

            // Update file path dan nama file di database
            $material->file_path = $filePath;
            $material->file_name = $file->getClientOriginalName();
            $material->is_uploaded = true; // Menandakan bahwa file telah diupload
        }

        // Update data lainnya (ID dosen dan kursus)
        $material->lecturer_id = $request->lecturer_id;
        $material->course_id = $request->course_id;

        // Simpan perubahan
        $material->save();

        // Redirect kembali ke halaman material dengan pesan sukses
        return redirect()->route('materials.index')->with('success', 'Material updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus materi dari database dan file dari penyimpanan
        $material = Material::findOrFail($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($material->file_path);

        // Hapus data dari database
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material deleted successfully.');
    }
}

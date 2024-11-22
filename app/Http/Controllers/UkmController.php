<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UkmController extends Controller
{
    // Menampilkan semua data UKM
    public function index()
    {
        $ukms = Ukm::all(); // Mengambil semua data UKM
        return view('dashboard.ukm.index', compact('ukms')); // Menampilkan ke view dashboard.ukm.index
    }

    // Menampilkan form untuk membuat UKM baru
    public function create()
    {
        return view('dashboard.ukm.create'); // Menampilkan view untuk form tambah UKM
    }

    // Menyimpan data UKM baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        Ukm::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->route('ukms.index')->with('success', 'UKM added successfully');
    }

    // Menampilkan form untuk mengedit data UKM
    public function edit($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('dashboard.ukm.edit', compact('ukm')); // Menampilkan view untuk form edit UKM
    }

    // Mengupdate data UKM
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $ukm = Ukm::findOrFail($id);
        $ukm->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->route('ukms.index')->with('success', 'UKM updated successfully');
    }

    // Menghapus data UKM
    public function destroy($id)
    {
        $ukm = Ukm::findOrFail($id);
        $ukm->delete();

        return redirect()->route('ukms.index')->with('success', 'UKM deleted successfully');
    }
}

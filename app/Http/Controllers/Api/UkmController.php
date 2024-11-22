<?php

namespace App\Http\Controllers\api;

use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UkmController extends Controller
{
    // Menampilkan semua data UKM
    public function index()
    {
        $ukms = Ukm::all();
        return response()->json($ukms);
    }

    // Menampilkan detail satu UKM berdasarkan ID
    public function show($id)
    {
        $ukm = Ukm::find($id);

        if (!$ukm) {
            return response()->json(['message' => 'UKM not found'], 404);
        }

        return response()->json($ukm);
    }

    // Menyimpan data UKM baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $ukm = Ukm::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return response()->json($ukm, 201); // Menampilkan data yang baru dibuat
    }

    // Mengupdate data UKM
    public function update(Request $request, $id)
    {
        $ukm = Ukm::find($id);

        if (!$ukm) {
            return response()->json(['message' => 'UKM not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $ukm->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return response()->json($ukm);
    }

    // Menghapus data UKM
    public function destroy($id)
    {
        $ukm = Ukm::find($id);

        if (!$ukm) {
            return response()->json(['message' => 'UKM not found'], 404);
        }

        $ukm->delete();

        return response()->json(['message' => 'UKM deleted successfully']);
    }
}

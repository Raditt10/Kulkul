<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ekskul;

class EkskulController extends Controller
{
    public function viewData()
    {
        $data = ekskul::all();
        return view('admin.ekstrakurikuler', compact('data'));
    }

    public function store(Request $request)
    {
        // ✅ Ambil data dari JSON
        $data = $request->json()->all();

        $ekskul = ekskul::create([
            'nama_ekskul' => $data['nama'] ?? '',
            'kategori' => $data['kategori'] ?? '',
            'pembina' => $data['pembina'] ?? '',
            'hari' => $data['hari'] ?? '',
            'jam_mulai' => isset($data['waktu']) ? explode(' - ', $data['waktu'])[0] : null,
            'jam_selesai' => isset($data['waktu']) ? explode(' - ', $data['waktu'])[1] : null,
            'anggota' => $data['anggota'] ?? 0,
            'deskripsi' => $data['deskripsi'] ?? '',
        ]);

        return response()->json([
            'success' => true,
            'data' => $ekskul
        ]);
    }

    public function update(Request $request, $id)
    {
        // ✅ Ambil data dari JSON
        $data = $request->json()->all();
        logger('Update data:', $data);  // <-- ini akan tercatat di storage/logs/laravel.log

        $ekskul = ekskul::findOrFail($id);

        $ekskul->update([
            'nama_ekskul' => $data['nama'] ?? '',
            'kategori' => $data['kategori'] ?? '',
            'pembina' => $data['pembina'] ?? '',
            'hari' => $data['hari'] ?? '',
            'jam_mulai' => isset($data['waktu']) ? explode(' - ', $data['waktu'])[0] : null,
            'jam_selesai' => isset($data['waktu']) ? explode(' - ', $data['waktu'])[1] : null,
            'anggota' => $data['anggota'] ?? 0,
            'deskripsi' => $data['deskripsi'] ?? '',
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        try {
            $ekskul = Ekskul::findOrFail($id);
            $ekskul->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

}

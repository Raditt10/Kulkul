<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ekskul;

class EkskulController extends Controller
{
    public function viewData()
    {
        $data_ekskul = ekskul::all();
        return view('admin.ekstrakurikuler', compact('data_ekskul'));
    }

    public function viewUser()
    {
        $data_ekskul = Ekskul::all();
        return view('user.form', compact('data_ekskul'));
    }

    public function store(Request $request)
    {
        // ✅ Ambil data dari JSON
        $data_ekskul = $request->json()->all();

        $ekskul = ekskul::create([
            'nama_ekskul' => $data_ekskul['nama'] ?? '',
            'kategori' => $data_ekskul['kategori'] ?? '',
            'pembina' => $data_ekskul['pembina'] ?? '',
            'hari' => $data_ekskul['hari'] ?? '',
            'jam_mulai' => isset($data_ekskul['waktu']) ? explode(' - ', $data_ekskul['waktu'])[0] : null,
            'jam_selesai' => isset($data_ekskul['waktu']) ? explode(' - ', $data_ekskul['waktu'])[1] : null,
            'anggota' => $data_ekskul['anggota'] ?? 0,
            'deskripsi' => $data_ekskul['deskripsi'] ?? '',
        ]);

        return response()->json([
            'success' => true,
            'data' => $ekskul
        ]);
    }

    public function update(Request $request, $id)
    {
        // ✅ Ambil data dari JSON
        $data_ekskul = $request->json()->all();
        logger('Update data:', $data_ekskul);  // <-- ini akan tercatat di storage/logs/laravel.log

        $ekskul = ekskul::findOrFail($id);

        $ekskul->update([
            'nama_ekskul' => $data_ekskul['nama'] ?? '',
            'kategori' => $data_ekskul['kategori'] ?? '',
            'pembina' => $data_ekskul['pembina'] ?? '',
            'hari' => $data_ekskul['hari'] ?? '',
            'jam_mulai' => isset($data_ekskul['waktu']) ? explode(' - ', $data_ekskul['waktu'])[0] : null,
            'jam_selesai' => isset($data_ekskul['waktu']) ? explode(' - ', $data_ekskul['waktu'])[1] : null,
            'anggota' => $data_ekskul['anggota'] ?? 0,
            'deskripsi' => $data_ekskul['deskripsi'] ?? '',
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

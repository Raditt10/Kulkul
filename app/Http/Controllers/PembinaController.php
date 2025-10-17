<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembina;

class PembinaController extends Controller
{
    // Menampilkan semua data pembina
    public function viewData()
    {
        $data_pembina = Pembina::all();
        return view('admin.pembina', compact('data_pembina'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|unique:pembinas',
            'nuptk' => 'nullable',
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required',
            'email' => 'required|email|unique:pembinas',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'ekskul' => 'required|array',
            'kategori' => 'required',
            'pengalaman' => 'required|integer',
            'status' => 'required|in:Aktif,Cuti,Non-Aktif',
            'jumlah_siswa' => 'nullable|integer'
        ]);

        // Buat data baru
        $pembina = Pembina::create($data);

        return response()->json([
            'success' => true,
            'data' => $pembina
        ]);
    }

    // Mengupdate data pembina
    public function update(Request $request, $id)
    {
        $pembina = Pembina::findOrFail($id);

        $data = $request->validate([
            'nip' => 'required|unique:pembinas,nip,' . $id,
            'nuptk' => 'nullable',
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required',
            'email' => 'required|email|unique:pembinas,email,' . $id,
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'ekskul' => 'required|array',
            'kategori' => 'required',
            'pengalaman' => 'required|integer',
            'status' => 'required|in:Aktif,Cuti,Non-Aktif',
            'jumlah_siswa' => 'nullable|integer'
        ]);

        $pembina->update($data);

        return response()->json([
            'success' => true,
            'data' => $pembina
        ]);
    }

    // Menghapus data pembina
    public function destroy($id)
    {
        try {
            $pembina = Pembina::findOrFail($id);
            $pembina->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data pembina berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}

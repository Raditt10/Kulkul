<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\ekskul;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FormPendaftaranController extends Controller
{
    public function index()
    {
        $data_ekskul = Ekskul::all();
        $user = session('user'); // Ambil data user yang sedang login

        return view('user.form', compact('data_ekskul', 'user'));
    }

    public function viewUser()
    {
        $data_ekskul = Ekskul::all();
        return view('user.form', compact('data_ekskul'));
    }

    public function store(Request $request)
{
    try {
        \Log::info('Form data received:', $request->all());
        
        $validated = $request->validate([
            'nis' => 'required',
            'ekskul_id' => 'required|exists:ekskuls,id_ekskul',
            'alasan' => 'required|string|max:1000',
        ]);

        \Log::info('Validation passed');

        $pendaftaran = Pendaftaran::create([
            'nis' => $validated['nis'],
            'ekskul_id' => $validated['ekskul_id'],
            'alasan' => $validated['alasan'],
            'tgl_pendaftaran' => Carbon::now()->toDateString(),
            'status' => 'pending',
        ]);

        \Log::info('Pendaftaran created:', $pendaftaran->toArray());

        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        \Log::error('Error in store method: ' . $e->getMessage());
        \Log::error('Stack trace: ' . $e->getTraceAsString());
        
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 500);
    }
}
}

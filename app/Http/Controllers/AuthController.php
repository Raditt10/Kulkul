<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Usercontroler extends Controller
{
public function login(Request $request)
{
    $data = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('name', $data['username'])->first();

        if ($user && $data['password'] === $user->password) {
        session(['user' => $user]);

        if($user->pangkat === 'admin'){
            return response()->json(['success' => true,'admin'=>true]);
        }
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false,'admin'=>true]);
}

public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        // Ambil user dari session custom (bukan Auth)
        $sessionUser = session('user');

        if (!$sessionUser) {
            return response()->json(['error' => 'User belum login.'], 401);
        }

        // Ambil ulang user dari database berdasarkan ID
        Log::info('Session user:', [session('user')]);
        $user = User::where('nis', $sessionUser->nis)->first();

        if (!$user) {
            return response()->json(['error' => 'Data user tidak ditemukan.'], 404);
        }

        // Periksa apakah password lama cocok
        if ($request->old_password != $user->password) {
            return response()->json(['error' => 'Password lama salah.'], 400);
        }

        // Update password baru (gunakan hash untuk keamanan)
        $user->password = $request->new_password;
        $user->save();

        // Update juga session biar tidak logout otomatis
        session(['user' => $user]);

        return response()->json(['message' => 'Password berhasil diubah.']);
    }

}
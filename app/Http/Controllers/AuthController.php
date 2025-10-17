<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin() {
        return view('user.login'); // nama file login.blade.php kamu
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cari user berdasarkan username atau NIS
        $user = User::where('name', $credentials['username'])
                ->orWhere('nis', $credentials['username'])
                ->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User tidak ditemukan']);
        }
        // Cek kalau user ditemukan
        if ($user) {
            // Untuk debug (tanpa hash)
            if ($user && $credentials['password'] === $user->password) {
                // Simpan user ke session (gpt)
                session(['user' => $user]);

                if ($user->pangkat === 'admin') {
                    return response()->json(['success' => true, 'admin' => true]);
                }

                return response()->json(['success' => true, 'admin' => false]);
            } else {
                return response()->json(['success' => false, 'message' => 'Password salah']);
            }

            dd(session('users'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);

        if ($request->has('remember')) {
            cookie()->queue(cookie('user_token', $user->id, 60 * 24 * 30)); // 30 hari
        }
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
    
    public function logout(Request $request) {

        Cookie::queue(Cookie::forget('auto_login_token'));

        session()->forget('user');
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function home()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user = session('user');

        // Kalau user admin, arahkan ke dashboard admin
        if ($user->pangkat === 'admin') {
            return view('admin.dashboard', ['user' => $user]);
        }

        // Kalau user biasa
        return view('user.home', ['user' => $user]);
    }
}

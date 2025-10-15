<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login'); // nama file login.blade.php kamu
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
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
            if ($credentials['password'] === $user->password) {
                // Simpan user ke session
                session(['users' => $user]);

                if ($user->pangkat === 'admin') {
                    return response()->json(['success' => true, 'admin' => true]);
                }

                return response()->json(['success' => true, 'admin' => false]);
            } else {
                return response()->json(['success' => false, 'message' => 'Password salah']);
            }
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);

        if ($request->has('remember')) {
            cookie()->queue(cookie('user_token', $user->id, 60 * 24 * 30)); // 30 hari
        }
    }

    public function home()
    {
        $user = session('users');
        return view('user/home', [
            'user'=>$user
        ]);
    }
    
    public function logout(Request $request) {
        // if ($user = Auth::user()) {
        //     $user->update(['login_token' => null]);
        // }

        Auth::logout();

        Cookie::queue(Cookie::forget('auto_login_token'));

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

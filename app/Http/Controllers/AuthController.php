<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login'); // nama file login.blade.php kamu
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
    }

    public function logout(Request $request) {
        if ($user = Auth::user()) {
        $user->update(['login_token' => null]);
    }

    Auth::logout();

    Cookie::queue(Cookie::forget('auto_login_token'));

    $request->session()->invalidate();
    $request->session()->regenerateToken();
        return redirect('/login');
    }
}

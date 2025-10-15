<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('name', $credentials['username']);
        if ($user && $credentials['password'] === $user->password) {
            session(['users' => $user]);

            if($user->pangkat === 'admin'){
                return response()->json(['success' => true,'admin'=>true]);
            }
            return response()->json(['success' => true, 'admin'=>false]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
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

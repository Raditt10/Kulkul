<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan ada session user
        $user = session('users');

        // Kalau pakai key 'user' ubah session('users') ke session('user') sesuai implementasimu
        if (! $user) {
            // Not logged in -> redirect ke login
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek role/pangkat; sesuaikan 'pangkat' dengan nama kolom di DB-mu
        if (isset($user->pangkat) && $user->pangkat === 'admin') {
            return $next($request);
        }

        // Kalau pakai array session: if (isset($user['pangkat']) && $user['pangkat'] === 'admin')
        // Forbidden - bisa redirect ke home atau abort(403)
        return abort(403, 'Unauthorized. Anda tidak memiliki akses ke halaman ini.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        // 👇 Custom redirect ke halaman login kalau belum login
        if (! $request->expectsJson()) {
            return route('login');
        }
        return null;
    }

    // public function handle(Request $request, Closure $next): Response
    // {
    //     // Cek apakah user sudah login
    //     if (!session()->has('users')) {
    //         // Kalau belum login, redirect ke halaman login
    //         return redirect()->route('login');
    //     }
    //     // Kalau sudah login, lanjutkan request
    //     return $next($request);
    // }
}
<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{ 
    protected function redirectTo($request): ?string
    {
        // 👇 Custom redirect ke halaman login kalau belum login
        if (! $request->expectsJson()) {
            if (!session()->has('users')) {
                return route('login');
            }
        }
        return null;
    }
}
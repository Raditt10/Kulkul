<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends \Illuminate\Auth\Middleware\Authenticate
{
    public function handle(Request $request, Closure $next, ...$guards): Response|RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
    protected function redirectTo($request): ?string
    {
        // 👇 Custom redirect ke halaman login kalau belum login
        if (! $request->expectsJson()) {
            return route('login');
        }
        return null;
    }
}
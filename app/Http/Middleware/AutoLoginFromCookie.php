<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AutoLoginFromCookie
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!session()->has('users') && $request->hasCookie('user_token')) {
    //         $userId = $request->cookie('user_token');
    //         $user = User::find($userId);
    //         if ($user) {
    //             session(['users' => $user]);
    //         }
    //     }
    //     return $next($request);
    // }
}

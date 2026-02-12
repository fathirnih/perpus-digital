<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login anggota
        if (!Auth::guard('anggota')->check()) {
            return redirect()->route('anggota.login');
        }

        // Kalau sedang login sebagai admin, paksa logout admin
        if (Auth::check()) {
            Auth::logout();
        }

        return $next($request);
    }
}

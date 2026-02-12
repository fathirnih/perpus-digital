<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login admin
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        // Kalau sedang login sebagai anggota, paksa logout anggota
        if (Auth::guard('anggota')->check()) {
            Auth::guard('anggota')->logout();
        }

        return $next($request);
    }
}

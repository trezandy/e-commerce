<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna yang sedang login melalui guard 'filament'
        // memiliki peran sebagai ADMIN.
        if (Auth::guard('filament')->check() && Auth::guard('filament')->user()->role === UserRole::ADMIN) {
            // Jika ya, izinkan untuk melanjutkan request.
            return $next($request);
        }

        // Jika tidak, tolak akses dengan halaman 403 Forbidden.
        // abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        Auth::logout();
        return redirect()->route('filament.admin.auth.login')->withErrors([
            'email' => 'Anda tidak memiliki hak akses ke halaman ini.',
        ]);
    }
}

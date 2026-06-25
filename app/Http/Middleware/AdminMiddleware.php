<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN role-nya adalah 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Jika tidak, tendang ke halaman login dengan pesan error
        return redirect()->route('admin.login')->with('error', 'Akses ditolak! Anda bukan Admin.');
    }
}
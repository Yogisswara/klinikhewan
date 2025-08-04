<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOrDokter
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'dokter'])) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Akses hanya untuk Admin atau Dokter.');
    }
}

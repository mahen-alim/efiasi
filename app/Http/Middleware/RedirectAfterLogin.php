<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RedirectAfterLogin
{
    public function handle($request, Closure $next)
    {
        // Simpan URL halaman yang sedang diakses sebelum login
        Session::put('previousUrl', url()->previous());

        return $next($request);
    }
}

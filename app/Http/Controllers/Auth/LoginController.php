<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        // Validate if the user exists in the 'users' table based on email
        $credentials = $this->credentials($request);
        if (!Auth::attempt($credentials)) {
            return false;
        }

        return true;
    }
    
    public function showLoginForm()
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, alihkan ke halaman yang sesuai
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Jika belum login, tampilkan halaman login
        return view('auth.login');
    }
}

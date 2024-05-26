<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Attempt to authenticate the user with the provided credentials
        if (!Auth::attempt($credentials)) {
            return false;
        }

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user's level is 'END USER'
        if ($user->level === 'END USER') {
            // Logout the user
            Auth::logout();

            // Optionally, you can log the event or return a specific message
            return response()->json(['status' => 'error', 'message' => 'User level END USER is not allowed to login'], 403);
        }

        return true;
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    public function showLoginForm()
    {
        // Check if the user is already logged in
        if (Auth::check()) {
            // If already logged in, redirect to the intended page
            return redirect()->intended($this->redirectTo);
        }

        // If not logged in, display the login page
        return view('auth.login');
    }
}

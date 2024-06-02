<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('email', $google_user->getEmail())->first();

            if ($user) {
                // Cek jika level user adalah 'END USER'
                if ($user->level === 'END USER') {
                    return redirect()->route('login')->withErrors(['error' => 'User level END USER is not allowed to login']);
                }

                Auth::login($user);

                return redirect()->intended('dashboard');
            } else {
                // Pastikan nilai 'DEFAULT LEVEL' sesuai dengan batasan kolom 'level'
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'alamat' => 'Nganjuk', // Ganti 'Alamat default' dengan alamat yang sesuai dari Google
                    'no_hp' => '1234567890', // Assign the value directly as a string
                    'quote' => '"Kode yang baik adalah seperti puisi; mereka memberikan makna dalam pengurangan yang paling kecil." - Dominic Licciardi',
                    'password' => bcrypt('12345'),
                    'profile_picture' => $google_user->getAvatar() ?? 'https://example.com/default-profile-picture.jpg',
                    'level' => 'ADMIN' // Sesuaikan dengan level default yang sesuai
                ]);

                // Cek jika level user baru adalah 'END USER'
                if ($new_user->level === 'END USER') {
                    return redirect()->route('login')->withErrors(['error' => 'User level END USER is not allowed to login']);
                }

                Auth::login($new_user);

                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors(['error' => 'Something went wrong: ' . $th->getMessage()]);
        }
    }
}

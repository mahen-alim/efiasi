<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
                Auth::login($user);
                return redirect()->intended('dashboard');
            } else {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'location' => 'Nganjuk', // Ganti 'Alamat default' dengan alamat yang sesuai dari Google
                    'mobile_phone' => 1234567890, // Assign the value directly as an integer
                    'quote' => '"Kode yang baik adalah seperti puisi; mereka memberikan makna dalam pengurangan yang paling kecil." - Dominic Licciardi',
                    'password' => bcrypt('12345'),
                    'profile_picture' => $google_user->getAvatar() ?? 'https://example.com/default-profile-picture.jpg',
                ]);                              

                Auth::login($new_user);

                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong'. $th->getMessage());
        }
    }
}

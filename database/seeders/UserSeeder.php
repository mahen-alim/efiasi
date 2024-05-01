<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'John Doe',
                'email' => 'admin@gmail.com',
                'password' => 'password123',
                'level' => 'ADMIN',
                'quote' => 'Kode yang baik adalah seperti puisi; mereka memberikan makna dalam pengurangan yang paling kecil. - Dominic Licciardi',
            ],
            // Tambahkan data akun lainnya sesuai kebutuhan
        ];

        foreach ($data as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'level' => $userData['level'],
                'password' => Hash::make($userData['password']),
                'quote' => $userData['quote'],
            ]);
        }
    }
}

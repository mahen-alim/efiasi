<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        // Eager load users with their related services including the 'tipe_service' column
        $users = User::with('services')->where('level', '!=', 'ADMIN')->get(); // Tambahkan ->get() untuk mengambil hasil

        // Hitung total pelanggan (pengguna dengan level bukan 'ADMIN')
        $totalPelanggan = $users->count(); // Menggunakan $users yang sudah dimuat

        // Menghitung jumlah pengguna yang memiliki setidaknya satu layanan dalam tabel services
        $totalPemesan = $users->filter(function ($user) {
            return $user->services->isNotEmpty(); // Memeriksa apakah pengguna memiliki setidaknya satu layanan dalam tabel services
        })->count();
        
        return view('dashboard.index', [
            'users' => $users,
            'totalPelanggan' => $totalPelanggan,
            'totalPemesan' => $totalPemesan
        ]);
    }


    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}

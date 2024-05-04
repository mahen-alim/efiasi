<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;

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

        // Mendapatkan tanggal kemarin
        $tanggalKemarin = Carbon::yesterday()->toDateString();

        // Mendapatkan tanggal hari ini
        $tanggalHariIni = Carbon::today()->toDateString();

        // Mengambil total pendapatan hari ini
        $totalPendapatanHariIni = Service::whereDate('created_at', $tanggalHariIni)->sum('price');

        // Mengambil total pendapatan kemarin
        $totalPendapatanKemarin = Service::whereDate('created_at', $tanggalKemarin)->sum('price');

        // Hitung selisih pendapatan
        $selisihPendapatan = $totalPendapatanHariIni - $totalPendapatanKemarin;

        // Hitung persentase kenaikan pendapatan
        if ($totalPendapatanKemarin > 0) {
            $persentaseKenaikan = ($selisihPendapatan / $totalPendapatanKemarin) * 100;
        } else {
            // Handle jika total pendapatan kemarin 0 atau tidak ada data
            $persentaseKenaikan = 0;
        }

        // Menghitung jumlah total dari kolom price di tabel services
        $totalHargaLayanan = $users->map(function ($user) {
            // Mengambil total harga layanan untuk setiap pengguna
            return $user->services->sum('price');
        });

        return view('dashboard.index', [
            'users' => $users,
            'totalPelanggan' => $totalPelanggan,
            'totalPemesan' => $totalPemesan,
            'totalHargaLayanan' => $totalHargaLayanan,
            'persentaseKenaikan' => $persentaseKenaikan
        ]);
    }


    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}

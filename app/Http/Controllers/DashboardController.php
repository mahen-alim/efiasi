<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Outcome;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Eager load users with their related services including the 'tipe_service' column
        $users = User::with('services')->where('level', '!=', 'ADMIN')->get(); // Tambahkan ->get() untuk mengambil hasil

        // Ambil data sparepart berdasarkan ID
        $sparepart = Sparepart::all();

        $totalSparepart = $sparepart->count();

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

        // Mengambil total pendapatan hari ini
        $totalPelangganHariIni = Service::whereDate('created_at', $tanggalHariIni)->sum('user_id');

        // Mengambil total pendapatan kemarin
        $totalPelangganKemarin = Service::whereDate('created_at', $tanggalKemarin)->sum('user_id');

        // Mengambil total jumlah sparepart hari ini
        $totalSparepartHariIni = Sparepart::whereDate('created_at', $tanggalHariIni)->count();

        // Mengambil total jumlah sparepart kemarin
        $totalSparepartKemarin = Sparepart::whereDate('created_at', $tanggalKemarin)->count();

        // Mengambil total jumlah barang keluar (quantity) dari tabel outcomes berdasarkan sparepart_id yang memiliki status CONFIRMED
        // $totalBarangKeluarConfirmed = Income::whereHas('spareparts', function ($query) {
        //     $query->where('status', 'CONFIRMED');
        // })->count();

        // Hitung selisih pendapatan
        $selisihPendapatan = $totalPendapatanHariIni - $totalPendapatanKemarin;

        //Hitung selisih pelanggan
        $selisihPelanggan = $totalPelangganHariIni - $totalPelangganKemarin;

        // Hitung selisih jumlah sparepart
        $selisihSparepart = $totalSparepartHariIni - $totalSparepartKemarin;

        // Hitung persentase kenaikan pendapatan
        if ($totalPendapatanKemarin > 0) {
            $persentaseKenaikanPendapatan = ($selisihPendapatan / $totalPendapatanKemarin) * 100;
        } else {
            // Handle jika total pendapatan kemarin 0 atau tidak ada data
            $persentaseKenaikanPendapatan = 0;
        }

        // Hitung persentase kenaikan pelanggan
        if ($totalPelangganKemarin > 0) {
            $persentaseKenaikanPelanggan = ($selisihPelanggan / $totalPelangganKemarin) * 100;
        } else {
            // Handle jika total pendapatan kemarin 0 atau tidak ada data
            $persentaseKenaikanPelanggan = 0;
        }

        // Hitung persentase kenaikan jumlah sparepart
        if ($totalSparepartKemarin > 0) {
            $persentaseKenaikanSparepart = ($selisihSparepart / $totalSparepartKemarin) * 100;
        } else {
            // Handle jika total jumlah sparepart kemarin 0 atau tidak ada data
            $persentaseKenaikanSparepart = 0;
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
            'persentaseKenaikanPendapatan' => $persentaseKenaikanPendapatan,
            'persentaseKenaikanPelanggan' => $persentaseKenaikanPelanggan,
            'totalSparepart' => $totalSparepart,
            'persentaseKenaikanSparepart' => $persentaseKenaikanSparepart,
            // 'totalBarangKeluarConfirmed' => $totalBarangKeluarConfirmed
        ]);
        // return response()->json(['data' => $users], 200);
    }


    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}

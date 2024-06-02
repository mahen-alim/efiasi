<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Outcome;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Events\Validated;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::with('services')->where('level', '==', 'END USER')->get();
        $sparepart = Sparepart::all();
        $totalSparepart = $sparepart->count();
        $totalPelanggan = $users->count();
        $totalPemesan = $users->filter(function ($user) {
            return $user->services->isNotEmpty();
        })->count();
        $tanggalKemarin = Carbon::yesterday()->toDateString();
        $tanggalHariIni = Carbon::today()->toDateString();
        $totalPendapatanHariIni = Service::whereDate('created_at', $tanggalHariIni)->sum('price');
        $totalPendapatanKemarin = Service::whereDate('created_at', $tanggalKemarin)->sum('price');
        $totalPelangganHariIni = Service::whereDate('created_at', $tanggalHariIni)->sum('user_id');
        $totalPelangganKemarin = Service::whereDate('created_at', $tanggalKemarin)->sum('user_id');
        $totalSparepartHariIni = Sparepart::whereDate('created_at', $tanggalHariIni)->count();
        $totalSparepartKemarin = Sparepart::whereDate('created_at', $tanggalKemarin)->count();

        $selisihPendapatan = $totalPendapatanHariIni - $totalPendapatanKemarin;
        $selisihPelanggan = $totalPelangganHariIni - $totalPelangganKemarin;
        $selisihSparepart = $totalSparepartHariIni - $totalSparepartKemarin;

        $persentaseKenaikanPendapatan = ($totalPendapatanKemarin > 0) ? ($selisihPendapatan / $totalPendapatanKemarin) * 100 : 0;
        $persentaseKenaikanPelanggan = ($totalPelangganKemarin > 0) ? ($selisihPelanggan / $totalPelangganKemarin) * 100 : 0;
        $persentaseKenaikanSparepart = ($totalSparepartKemarin > 0) ? ($selisihSparepart / $totalSparepartKemarin) * 100 : 0;

        $totalHargaLayanan = $users->map(function ($user) {
            return $user->services->sum('price');
        });

        return view('dashboard.index', compact(
            'users',
            'totalPelanggan',
            'totalPemesan',
            'totalHargaLayanan',
            'persentaseKenaikanPendapatan',
            'persentaseKenaikanPelanggan',
            'totalSparepart',
            'persentaseKenaikanSparepart'
        ));
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}

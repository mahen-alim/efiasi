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
        $users = User::with('services')
            ->where('level', '!=', 'ADMIN') // Filter pengguna yang bukan 'ADMIN'
            ->paginate(5);

        // Hitung total pelanggan (pengguna dengan level bukan 'ADMIN')
        $totalPelanggan = User::where('level', '!=', 'ADMIN')->count();

        return view('dashboard.index', [
            'users' => $users,
            'totalPelanggan' => $totalPelanggan,
        ]);
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}

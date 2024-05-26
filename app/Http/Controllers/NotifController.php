<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;

// controller untuk menampilkan history pesanan
class NotifController extends Controller
{
    public function index()
    {
        // Eager load users with their related services including the 'tipe_service' column
        $users = User::with('services')->where('level', '!=', 'ADMIN')->get(); // Tambahkan ->get() untuk mengambil hasil

        return view('notif.index', compact('users'));
    }

    public function destroy($id)
    {
        // Mencari data service
        $users = Service::find($id);
        $users->delete();

        return redirect('/notif')->with('success', 'Pesanan berhasil dibatalkan');
    }
}

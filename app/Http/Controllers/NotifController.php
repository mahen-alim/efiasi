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
        // Eager load users with their related services and reservations, and order by name in ascending order
        $users = User::with('services.reservations')
            ->where('level', '!=', 'ADMIN')
            ->orderBy('id', 'desc')
            ->get();

        return view('notif.index', compact('users'));
    }


    public function destroy($id)
    {
        // Mencari data user berdasarkan id
        $user = User::find($id);

        // Pastikan user ditemukan
        if ($user) {
            // Hapus layanan yang terkait dengan user ini
            foreach ($user->services as $service) {
                // Hapus reservasi yang terkait dengan layanan ini
                foreach ($service->reservations as $reservation) {
                    $reservation->delete();
                }
                // Hapus layanan itu sendiri
                $service->delete();
            }

            return redirect('/notif')->with('success', 'Pesanan berhasil dihapus');
        } else {
            return redirect('/notif')->with('error', 'Pesanan tidak ditemukan');
        }
    }
}

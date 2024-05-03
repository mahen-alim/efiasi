<?php

namespace App\Http\Controllers;

use App\Models\User;

class NotifController extends Controller
{
    public function index()
    {
        // Eager load users with their related services including the 'tipe_service' column
        $users = User::with('services')->where('level', '!=', 'ADMIN')->get(); // Tambahkan ->get() untuk mengambil hasil

        return view('notif.index', compact('users'));
    }
}

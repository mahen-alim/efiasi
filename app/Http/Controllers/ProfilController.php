<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    // Method untuk menampilkan form edit profil
    public function edit($id)
    {
        $profil = User::findOrFail($id);
        return view('profil.edit', ['profil' => $profil]);
    }


    // Method untuk memperbarui profil pengguna
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:13', // Ubah validasi untuk memastikan nilai tetap dalam batas maksimum tipe data integer
            'location' => 'required|string|max:255',
            'quote' => 'required|string|max:255', // Tambahkan validasi untuk quote
        ]);

        // Mencari data pengguna
        $profil = User::find($id);

        // Menangani kasus ketika data tidak ditemukan
        if (!$profil) {
            // Handle ketika data tidak ditemukan, misalnya redirect atau response lainnya
            return redirect()->back()->with('error', 'Data pengguna tidak ditemukan.');
        }

        // Update data pengguna
        $profil->update([
            'name' => $request->name,
            'mobile_phone' => $request->mobile_phone,
            'location' => $request->location,
            'quote' => $request->quote,
        ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect('/profil')->with('success', 'Profil berhasil diperbarui.');
    }
}

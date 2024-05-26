<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Reservation::all();
        // $service = Service::all();

        return response()->json([
            'success' => $reservation
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_mobil' => 'required',
            'keluhan' => 'required',
            'gambar' => 'required',
            'tanggal_pemesanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Mendapatkan ID pengguna yang sedang login
        $user_id = Auth::id();

        // Membuat pesanan (reservation)
        $reservation = Reservation::create([
            'jenis_mobil' => $request->input('jenis_mobil'),
            'keluhan' => $request->input('keluhan'),
            'gambar' => $request->input('gambar'),
            'harga' => $request->input('harga'),
            'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
            'detailing_dan_variasi' => $request->input('detailing_dan_variasi'),
            'user_id' => $user_id, // tambahkan ini
        ]);

        // Membuat objek Income dengan menggunakan nilai yang telah diambil
        $income = Income::create([
            'tipe_service' => $reservation->detailing_dan_variasi,
            'reservation_id' => $reservation->id,
            'car_type' => $reservation->jenis_mobil,
            'total_price' => $reservation->harga,
        ]);

        return response()->json([
            'success' => $reservation, // Mengembalikan pesanan yang dibuat
            'message' => 'Data pesanan berhasil disimpan'
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Data pesanan tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'jenis_mobil' => 'required',
            'keluhan' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
            'tanggal_pemesanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update atribut layanan
        $reservation->update([
            'jenis_mobil' => $request->input('jenis_mobil'),
            'keluhan' => $request->input('keluhan'),
            'harga' => $request->input('harga'),
            'gambar' => $request->input('gambar'),
            'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
            'detailing_dan_variasi' => $request->input('detailing_dan_variasi'),
        ]);

        return response()->json([
            'data' => $reservation,
            'message' => 'Data pesanan berhasil dirubah'
        ], 200);
    }

    public function destroy($id)
    {
        $services = Reservation::find($id);

        if (!$services) {
            return response()->json(['message' => 'Data pesanan tidak ditemukan'], 404);
        }

        $services->delete();

        return response()->json(['message' => 'Data pesanan berhasil dihapus'], 200);
    }
}

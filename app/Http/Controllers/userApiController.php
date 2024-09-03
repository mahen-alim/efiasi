<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userApiController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return response()->json([
            'success' => $users
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|min:5',
            'price' => 'required|min:5',
            'description' => 'required|min:5|max:1000',
            'benefit' => 'required|min:5|max:1000',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Membuat pesanan (reservation)
        $users = Service::create([
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'benefit' => $request->input('benefit'),
            'duration' => $request->input('duration'),
        ]);

        return response()->json([
            'success' => $users, // Mengembalikan pesanan yang dibuat
            'message' => 'Data detailing berhasil disimpan'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

        if (!$users) {
            return response()->json(['message' => 'Data pengguna tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update atribut layanan
        $users->update([
            'name' => $request->input('jenis_mobil'),
            'email' => $request->input('price'),
            'no_hp' => $request->input('keluhan'),
            'level' => $request->input('harga'),
        ]);

        return response()->json([
            'data' => $users,
            'message' => 'Data pengguna berhasil dirubah'
        ], 200);
    }

    public function destroy($id)
    {
        $users = User::find($id);

        if (!$users) {
            return response()->json(['message' => 'Data pengguna tidak ditemukan'], 404);
        }

        $users->delete();

        return response()->json(['message' => 'Data pengguna berhasil dihapus'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userApiController extends Controller
{
    public function index()
    {
        $users = User::where('level', 'END USER')->get();

        return response()->json([
            'success' => $users
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Membuat pesanan (reservation)
        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'level' => $request->input('level'),
        ]);

        return response()->json([
            'success' => $users, // Mengembalikan pesanan yang dibuat
            'message' => 'Data pengguna berhasil disimpan'
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

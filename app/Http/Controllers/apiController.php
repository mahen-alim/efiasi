<?php

namespace App\Http\Controllers;

use App\Models\Service;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class apiController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return response()->json([
            'success' => $services
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe_service' => 'required|min:5',
            'price' => 'required|min:5',
            'description' => 'required|min:5|max:1000',
            'benefit' => 'required|min:5|max:1000',
            'duration' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $services = Service::create([
            'user_id' => $request->input('user_id'),
            'tipe_service' => $request->input('tipe_service'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'benefit' => $request->input('benefit'),
            'duration' => $request->input('duration'),
            'file' => $request->input('file'),
        ]);


        return response()->json([
            'success' => $services,
            'message' => 'Data detailing berhasil disimpan'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'tipe_service' => 'required|min:5',
            'price' => 'required|numeric|min:0', // Mengubah validasi harga menjadi numeric
            'description' => 'required|min:5|max:1000',
            // Tambahkan validasi untuk benefit, duration, dan user_id jika diperlukan
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update atribut layanan
        $service->update([
            'tipe_service' => $request->input('tipe_service'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            // Tambahkan atribut lainnya jika diperlukan
        ]);

        return response()->json([
            'data' => $service,
            'message' => 'Data service berhasil dirubah'
        ], 200);
    }

    public function destroy($id)
    {
        $services = Service::find($id);

        if (!$services) {
            return response()->json(['message' => 'Data detailing tidak ditemukan'], 404);
        }

        $services->delete();

        return response()->json(['message' => 'Data detailing berhasil dihapus'], 200);
    }
}

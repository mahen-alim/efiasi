<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Report;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        // Eager load users with their related services including the 'tipe_service' column
        $service = Service::paginate(5)->withQueryString();
        
        return view('service.index', compact('service'));
    }


    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'type' => 'required|min:5',
            'price' => 'required|min:5',
            'description' => 'required|min:5|max:1000',
            'benefit' => 'required|min:5|max:1000',
            'duration' => 'required',
            'file' => 'mimes:png,jpg,jpeg,gif|max:5000',
        ]);

        // Ambil ID pengguna dari sesi email
        $userId = Auth::user()->id;

        // Buat entri baru di tabel services dengan mengisi user_id dari session
        $service = new Service();
        $service->user_id = $userId;
        $service->tipe_service = $request->type;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->benefit = $request->benefit;
        $service->duration = $request->duration;
        $service->file = ''; // Isi dengan nilai file yang sesuai jika ada

        // Simpan entri ke dalam tabel
        $service->save();

        // get dropzone image
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename); // Move file to public/img directory
            $service->update([
                'file' => '/img/' . $filename, // Save the file path in the database
            ]);
        }        

        // Redirect ke halaman tertentu setelah data berhasil ditambahkan
        return redirect('/service-index')->with('success', 'Data detailing berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = Service::where('id', $id)->first();

        return view('service.edit', compact(['service']));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'type' => 'required|min:5',
            'price' => 'required|min:5',
            'description' => 'required|min:5',
            'benefit' => 'required|min:5',
            'duration' => 'required',
        ]);

        // Mencari data service
        $service = Service::find($id);

        // Menangani kasus ketika data tidak ditemukan
        if (!$service) {
            // Handle ketika data tidak ditemukan, misalnya redirect atau response lainnya
            return redirect()->back()->with('error', 'Data detailing tidak ditemukan.');
        }

        // Update data service
        $service->update([
            'tipe_service' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'benefit' => $request->benefit,
            'duration' => $request->duration,
        ]);

        return redirect('/service-index')->with('success', 'Data detailing berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mencari data service
        $service = Service::find($id);
        $service->delete();

        return redirect('/service-index')->with('success', 'Data detailing berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');

        if ($keyword) {
            $service = Service::where('tipe_service', 'LIKE', "%$keyword%")->get();
        } else {
            $service = Service::all();
        }

        return view('service.index', compact(['service']));
    }
}

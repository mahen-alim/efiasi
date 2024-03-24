<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::paginate(5)->withQueryString();
        return view('service.index', compact(['service']));
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
            'sparepart' => 'required|min:5',
            'qty' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses menyimpan file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Pastikan file telah diunggah dengan benar
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/dropzone'), $fileName);
            } else {
                // Jika file tidak valid, kembalikan dengan pesan kesalahan
                return redirect()->back()->withErrors(['file' => 'The file is not valid.'])->withInput();
            }
        } else {
            // Jika file tidak ada, kembalikan dengan pesan kesalahan
            return redirect()->back()->withErrors(['file' => 'No file uploaded.'])->withInput();
        }

        // Simpan data pada tabel services
        $service = Service::create([
            'tipe_service' => $request->type,
            'price' => $request->price,
            'sparepart' => $request->sparepart,
            'qty' => $request->qty,
            'file' => $fileName // Simpan nama file ke dalam database
        ]);

        // Simpan data pada tabel reports
        Report::create([
            'service_id' => $service->id,
            'tipe_service' => $request->type,
            'sparepart' => $request->sparepart,
            'stock' => $request->qty
        ]);

        // Redirect ke halaman tertentu setelah data berhasil ditambahkan
        return redirect('/service')->with('success', 'Data service berhasil ditambahkan');
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
            'sparepart' => 'required|min:5',
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
            'sparepart' => $request->sparepart,
        ]);

        return redirect('/service')->with('success', 'Data detailing berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mencari data service
        $service = Service::find($id);
        $service->delete();

        return redirect('/service')->with('success', 'Data detailing berhasil dihapus');
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

<?php

namespace App\Http\Controllers;

use App\Exports\ServiceExport;
use App\Exports\ServisExport;
use App\Models\Pagination;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        ]);

        // Simpan data pada tabel services
        $service = Service::create([
            'tipe_service' => $request->type,
            'price' => $request->price,
            'sparepart' => $request->sparepart,
            'qty' => $request->qty
        ]);

        Report::create([
            'service_id' => $service->id, // Menghubungkan laporan dengan layanan yang sesuai
            'tipe_service' => $request->type,
            'sparepart' => $request->sparepart,
            'qty' => $request->qty
            // Tambahkan kolom lainnya sesuai kebutuhan
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
            return redirect()->back()->with('error', 'Data service tidak ditemukan.');
        }

        // Update data service
        $service->update([
            'tipe_service' => $request->type,
            'price' => $request->price,
            'sparepart' => $request->sparepart,
        ]);

        return redirect('/service')->with('success', 'Data service berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mencari data service
        $service = Service::find($id);
        $service->delete();

        return redirect('/service')->with('success', 'Data service berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');

        if ($keyword) {
            $service = Service::where('tipe_service', 'LIKE', "%$keyword%")->get();
        } else {
            $service = Service::all();
        }

        return view('service.index', compact('service'));
    }

    public function export()
    {
        return Excel::download(new ServiceExport, 'servis.xlsx');
    }
}

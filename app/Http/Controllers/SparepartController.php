<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index()
    {
        $sparepart = sparepart::paginate(5)->withQueryString();
        return view('sparepart.index', compact(['sparepart']));
    }

    public function create()
    {
        return view('sparepart.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari request
        $request->validate([
            'name' => 'required|min:5',
            'jumlah' => 'required',
            'merk' => 'required|min:5',
            'price' => 'required|min:5',
        ]);

        // Simpan data ke dalam tabel spareparts
        $sparepart = sparepart::create([
            'name' => $request->name,
            'jumlah' => $request->jumlah,
            'merk' => $request->merk,
            'price' => $request->price,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/sparepart')->with('success', 'Data sparepart berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sparepart = sparepart::where('id', $id)->first();
        return view('sparepart.edit', compact(['sparepart']));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|min:5',
            'jumlah' => 'required',
            'merk' => 'required|min:5',
            'price' => 'required|min:5',
        ]);

        // Mencari data service
        $sparepart = sparepart::find($id);

        // Menangani kasus ketika data tidak ditemukan
        if (!$sparepart) {
            // Handle ketika data tidak ditemukan, misalnya redirect atau response lainnya
            return redirect()->back()->with('error', 'Data sparepart tidak ditemukan.');
        }

        // Update data service
        $sparepart->update([
            'name' => $request->name,
            'jumlah' => $request->jumlah,
            'merk' => $request->merk,
            'price' => $request->price,
        ]);

        return redirect('/sparepart')->with('success', 'Data sparepart berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mencari data service
        $sparepart = sparepart::find($id);
        $sparepart->delete();

        return redirect('/sparepart')->with('success', 'Data sparepart berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');

        if ($keyword) {
            $sparepart = sparepart::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $sparepart = sparepart::all();
        }

        return view('sparepart.index', compact('sparepart'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Models\Outcome;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index()
    {
        $sparepart = Sparepart::paginate(5)->withQueryString();
        $operational = Operational::all();

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
            'type' => 'required',
            'jumlah' => 'required',
            'merk' => 'required|min:5',
            'price' => 'required|min:5',
        ]);

        // Simpan data ke dalam tabel spareparts
        $sparepart = Sparepart::create([
            'name' => $request->name,
            'type' => $request->type,
            'jumlah' => $request->jumlah,
            'merk' => $request->merk,
            'price' => $request->price,
        ]);

        $outcome = Outcome::create([
            'cost_type' => $sparepart->type,
            'sparepart_id' => $sparepart->id,
        ]);
        // Redirect dengan pesan sukses
        return redirect()->route('dashboard.sparepart.index')->with('success', 'Data variasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sparepart = Sparepart::where('id', $id)->first();

        return view('sparepart.edit', compact(['sparepart']));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|min:5',
            'type' => 'required',
            'jumlah' => 'required',
            'merk' => 'required|min:5',
            'price' => 'required|min:4',
        ]);

        // Mencari data service
        $sparepart = Sparepart::find($id);

        // Menangani kasus ketika data tidak ditemukan
        if (!$sparepart) {
            // Handle ketika data tidak ditemukan, misalnya redirect atau response lainnya
            return redirect()->back()->with('error', 'Data variasi tidak ditemukan.');
        }

        // Update data service
        $sparepart->update([
            'name' => $request->name,
            'type' => $request->type,
            'jumlah' => $request->jumlah,
            'merk' => $request->merk,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard.sparepart.index')->with('success', 'Data variasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mencari data service
        $sparepart = Sparepart::find($id);
        $sparepart->delete();

        return redirect()->route('dashboard.sparepart.index')->with('success', 'Data variasi berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');

        if ($keyword) {
            $sparepart = Sparepart::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $sparepart = Sparepart::all();
        }

        return view('sparepart.index', compact('sparepart'));
    }
}

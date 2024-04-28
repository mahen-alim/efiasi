<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OperationalController extends Controller
{
    //Method untuk menangani fungsi pengembalian file view operatioanl.index
    public function index()
    {
        $operational = Operational::paginate(5)->withQueryString();

        return view('operational.index', compact(['operational']));
    }

    //Method untuk menampilkan formulir penambahan data operasional
    public function create()
    {
        return view('operational.create');
    }

    //Method untuk menyimpan data operasional setelah dilakukan validasi dan penambahan datanya
    public function store(Request $request)
    {
        //Properti untuk melakukan permintaan dari Request untuk memvalidasi data
        $request->validate([
            'type_cost' => 'required|min:5|unique:operationals',
            'nominal' => 'required|min:5',
            'category' => 'required',
            'description' => 'required|min:5',
        ]);

        // Buat data operasional baru
        $operational = Operational::create([
            'type_cost' => $request->type_cost,
            'nominal' => $request->nominal,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        Outcome::create([
            'operational_id' => $operational->id,
            'cost_type' => $request->category,
        ]);

        //Pengembalian nilai untuk beralih ke halaman operational.index jika data berhasil ditambahkan
        return redirect()->route('dashboard.operational.index')->with('success', 'Data operasional berhasil ditambahkan');
    }

    public function edit($id)
    {
        $operational = Operational::where('id', $id)->first();

        return view('operational.edit', compact(['operational']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_cost' => 'required|min:5',
            'nominal' => 'required|min:5',
            'category' => 'required',
            'description' => 'required|min:5',
        ]);

        // Mencari data service
        $operational = Operational::find($id);

        // Menangani kasus ketika data tidak ditemukan
        if (! $operational) {
            // Handle ketika data tidak ditemukan, misalnya redirect atau response lainnya
            return redirect()->back()->with('error', 'Data operasional tidak ditemukan.');
        }

        // Update data service
        $operational->update([
            'type_cost' => $request->type_cost,
            'nominal' => $request->nominal,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.operational.index')->with('success', 'Data operasional berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mencari data service
        $operational = Operational::find($id);
        $operational->delete();

        return redirect()->route('dashboard.operational.index')->with('success', 'Data operasional berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');

        if ($keyword) {
            $operational = Operational::where('type_cost', 'LIKE', "%$keyword%")->get();
        } else {
            $operational = Operational::all();
        }

        return view('operational.index', compact('operational'));
    }
}

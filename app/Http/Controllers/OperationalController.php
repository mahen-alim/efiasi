<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use Illuminate\Http\Request;

class OperationalController extends Controller
{
    public function index()
    {
        $operational = Operational::paginate(5)->withQueryString();
        return view('operational.index', compact(['operational']));
    }

    public function create()
    {
        return view('operational.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_cost' => 'required|min:5',
            'nominal' => 'required|min:5',
            'category' => 'required',
            'description' => 'required|min:10',
        ]);

        Operational::create([
            'type_cost' => $request->type_cost,
            'nominal' => $request->nominal,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect('/operational')->with('success', 'Data operasional berhasil ditambahkan');
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
            'description' => 'required|min:10',
        ]);

        // Mencari data service
        $operational = Operational::find($id);

        // Menangani kasus ketika data tidak ditemukan
        if (!$operational) {
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

        return redirect('/operational')->with('success', 'Data operasional berhasil diperbarui');
    }

    public function destroy($id) {
        // Mencari data service
        $operational = Operational::find($id);
        $operational->delete();

        return redirect('/operational')->with('success', 'Data operasional berhasil dihapus');
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

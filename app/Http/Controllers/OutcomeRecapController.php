<?php

namespace App\Http\Controllers;

use App\Exports\OutcomeExport;
use App\Exports\ReportMoneyExport;
use App\Models\Outcome;
use App\Models\Report;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OutcomeRecapController extends Controller
{
    public function index()
    {
        return view('report.outcome');
    }

    public function table(Request $request)
    {
        $request->validate([
            'outcome_type' => 'required',
            'date' => 'required',
        ]);

        $keyword = $request->input('outcome_type');
        $date = $request->input('date');

        $query = Outcome::query();

        // Menambahkan kondisi untuk jenis biaya yang dipilih
        if ($keyword) {
            $query->where('cost_type', 'LIKE', "%$keyword%");
        }

        // Memeriksa apakah input tanggal sudah diberikan oleh pengguna
        if ($date) {
            // Mengonversi format tanggal ke format yang sesuai dengan format yang disimpan di kolom created_at
            $formattedDate = date('Y-m-d', strtotime($date));
            // Mencari data berdasarkan tanggal yang dipilih
            $query->whereDate('created_at', $formattedDate);
        }

        $data = $query->get();

        if ($data->isEmpty()) {
            $failMessage = 'Data tidak ditemukan.';
        } else {
            $failMessage = '';
        }

        // Return view dengan data yang sesuai
        return view('report.money_table_outcome', compact('data', 'failMessage'));
    }


    public function export()
    {
        return Excel::download(new OutcomeExport, 'outcome_recap.xlsx');
    }
}

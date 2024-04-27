<?php

namespace App\Http\Controllers;

use App\Exports\ReportMoneyExport;
use App\Models\Report;
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

        $query = Report::query();

        if ($keyword) {
            $query->where('tipe_service', 'LIKE', "%$keyword%");
        }

        if ($date) {
            $query->whereDate('trans_time', $date);
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
        return Excel::download(new ReportMoneyExport, 'report_money.xlsx');
    }
}

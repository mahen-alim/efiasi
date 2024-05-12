<?php

namespace App\Http\Controllers;

use App\Exports\IncomeExport;
use App\Exports\ReportMoneyExport;
use App\Models\Income;
use App\Models\Report;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IncomeRecapController extends Controller
{
    public function index()
    {
        return view('report.income');
    }
    public function table(Request $request)
    {
        $request->validate([
            'income_type' => 'required',
            'date' => 'required',
        ]);

        $keyword = $request->input('income_type');
        $date = $request->input('date');

        $query = Income::query();

        $query->join('reservations', 'incomes.reservation_id', '=', 'reservations.id')
            ->select('incomes.*', 'reservations.tanggal_pemesanan AS trans_time');

        if ($keyword) {
            $query->where('incomes.tipe_service', 'LIKE', "%$keyword%");
        }

        if ($date) {
            $query->whereDate('incomes.created_at', $date);
        }

        $data = $query->get();

        if ($data->isEmpty()) {
            $failMessage = 'Data tidak ditemukan.';
        } else {
            $failMessage = '';
        }

        // Return view dengan data yang sesuai
        return view('report.money_table_income', compact('data', 'failMessage'));
    }

    public function export()
    {
        return Excel::download(new IncomeExport, 'income_recap.xlsx');
    }
}

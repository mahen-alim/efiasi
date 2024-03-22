<?php

namespace App\Http\Controllers;

use App\Exports\ReportMoneyExport;
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
        $keyword = $request->input('tipe_service');
        $date = $request->input('date');

        $query = Report::query();

        if ($keyword) {
            $query->where('tipe_service', 'LIKE', "%$keyword%");
        }

        if ($date) {
            $query->whereDate('trans_time', $date);
        }

        $data = $query->get();

        // Return view dengan data yang sesuai
        return view('report.money_table_income', compact('data'));
    }



    public function export()
    {
        return Excel::download(new ReportMoneyExport, 'report_money.xlsx');
    }
}

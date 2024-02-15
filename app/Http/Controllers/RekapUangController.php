<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RekapUangController extends Controller
{
    public function index()
    {
        return view('report.money');
    }

    public function table(Request $request)
    {
        if ($request->has('search')) {
            $data = Report::where('trans_time', 'LIKE', '%' . $request->date . '%');
        } else {
            $data = Report::all();
        }
        return view('report.money_table', compact(['data']));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapUangController extends Controller
{
    public function index()
    {
        return view('report.index');
    }
}

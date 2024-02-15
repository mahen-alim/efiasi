<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapOperasionalController extends Controller
{
    public function index()
    {
        return view('report.money');
    }
}

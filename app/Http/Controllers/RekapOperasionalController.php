<?php

namespace App\Http\Controllers;

class RekapOperasionalController extends Controller
{
    public function index()
    {
        return view('report.money');
    }
}

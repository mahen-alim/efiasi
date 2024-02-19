<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoBengkelController extends Controller
{
    public function index()
    {
        return view('info.index');
    }
}

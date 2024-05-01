<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(5)->withQueryString();

        return view('dashboard.index', compact(['users']));
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Misalnya, Anda memiliki model 'User'
        $users = User::all();

        return view('dashboard.index', compact(['users']));
    }
}

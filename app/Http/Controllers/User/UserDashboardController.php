<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.user'); // Pastikan file ini ada
    }
}

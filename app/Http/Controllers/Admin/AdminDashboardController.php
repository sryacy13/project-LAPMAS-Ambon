<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin'); // Pastikan file ini ada di resources/views/dashboard/admin.blade.php
    }
}

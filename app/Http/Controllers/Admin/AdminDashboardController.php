<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik Status Pengaduan
        $belumDiproses = Pengaduan::where('status', 'Belum diproses')->count();
        $sedangDiproses = Pengaduan::where('status', 'Sedang diproses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();
        $pengaduanDibatalkan = Pengaduan::where('status', 'Pengaduan Dibatalkan')->count();

        // Total Pengaduan
        $totalPengaduan = Pengaduan::count();

        // Statistik User
        $totalAdmin = User::where('role', 'admin')->count();
        $totalUser = User::where('role', 'user')->count(); // 🔹 Ambil data user
        $totalSemuaAkun = $totalAdmin + $totalUser;

        // Data Chart Pengaduan per Hari (7 hari terakhir)
        $pengaduanPerHari = Pengaduan::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get()
            ->reverse();

        $chartLabels = $pengaduanPerHari->pluck('tanggal')->map(function ($tanggal) {
            return Carbon::parse($tanggal)->format('Y-m-d');
        });

        $chartData = $pengaduanPerHari->pluck('jumlah');

        return view('admin.index', compact(
            'belumDiproses',
            'sedangDiproses',
            'selesai',
            'pengaduanDibatalkan',
            'totalPengaduan',
            'totalAdmin',
            'totalUser',
            'totalSemuaAkun',
            'chartLabels',
            'chartData'
        ));
    }
}

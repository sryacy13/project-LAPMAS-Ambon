<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengaduanExport;
use PDF;

class LaporanPengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('user')->latest()->get();

        return view('admin.laporan.pengaduan', compact('pengaduans'));
    }

    public function exportPdf()
    {
        $pengaduans = Pengaduan::with('user')->latest()->get();

        $pdf = PDF::loadView('admin.laporan.pdf', compact('pengaduans'));
        return $pdf->download('laporan_pengaduan.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PengaduanExport(null, null), 'laporan_pengaduan.xlsx');
    }
}

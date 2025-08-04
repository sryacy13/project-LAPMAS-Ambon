<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('user')->latest()->paginate(10);
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        // ✅ Validasi agar hanya status yang diizinkan yang bisa dipilih
        $validated = $request->validate([
            'status' => 'required|string|in:Belum diproses,Sedang diproses,Selesai,Pengaduan Dibatalkan',
            'tanggapan' => 'nullable|string|max:500',
        ]);

        // ✅ Update status & tanggapan secara langsung
        Pengaduan::where('id', $id)->update([
            'status' => $validated['status'],
            'tanggapan' => $validated['tanggapan'] ?? '',
        ]);

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Status & tanggapan berhasil diperbarui.');
    }
}

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
        $validated = $request->validate([
            'status' => 'required|string|in:Belum diproses,Sedang diproses,Selesai,Pengaduan Dibatalkan',
            'tanggapan' => 'nullable|string|max:500',
        ]);

        Pengaduan::where('id', $id)->update([
            'status' => $validated['status'],
            'tanggapan' => $validated['tanggapan'] ?? '',
        ]);

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Status & tanggapan berhasil diperbarui.');
    }

    /**
     * Menghapus data pengaduan.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    /**
     * Tampilkan form Buat Pengaduan
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())->latest()->get();
        return view('user.pengaduan.index', compact('pengaduan'));
    }
    
    public function create()
    {
        return view('user.pengaduan.create');
    }

    /**
     * Simpan Pengaduan ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'gambar' => $gambarPath,
        ]);

        return back()->with('success', 'Pengaduan berhasil disimpan!');
    }

    public function showAll()
{
    $pengaduan = Pengaduan::latest()->get();
    return view('user.pengaduan.all', compact('pengaduan'));
}

}

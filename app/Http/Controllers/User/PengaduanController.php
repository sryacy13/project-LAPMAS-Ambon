<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar pengaduan user
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())->latest()->get();
        return view('user.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Tampilkan form buat pengaduan
     */
    public function create()
    {
        return view('user.pengaduan.create');
    }

    /**
     * Simpan pengaduan ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

        ]);

        $gambarPath = $request->file('gambar') 
            ? $request->file('gambar')->store('pengaduan', 'public') 
            : null;

        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('user.pengaduan.index')->with('success', 'Pengaduan berhasil disimpan!');
    }

    /**
     * Menampilkan semua pengaduan (misalnya untuk admin/user lain)
     */
    public function showAll()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('user.pengaduan.all', compact('pengaduan'));
    }

    /**
     * Menampilkan form edit pengaduan
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('user.pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update pengaduan
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada gambar baru, hapus yang lama
        if ($request->hasFile('gambar')) {
            if ($pengaduan->gambar) {
                Storage::disk('public')->delete($pengaduan->gambar);
            }
            $pengaduan->gambar = $request->file('gambar')->store('pengaduan', 'public');
        }

        // Update data
        $pengaduan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'gambar' => $pengaduan->gambar,
        ]);

        return redirect()->route('user.pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    /**
     * Hapus pengaduan
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($pengaduan->gambar) {
            Storage::disk('public')->delete($pengaduan->gambar);
        }

        $pengaduan->delete();

        return redirect()->route('user.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}

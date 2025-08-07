<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengaduanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pengaduan::with('user')->get()->map(function ($item) {
            return [
                'tanggal' => $item->created_at->format('Y-m-d H:i:s'),
                'nama_pengadu' => $item->user->name,
                'isi_laporan' => $item->judul,
                'status' => $item->status,
            ];
        });
    }

    public function headings(): array
    {
        return ["Tanggal", "Nama Pengadu", "Isi Laporan", "Status"];
    }
}

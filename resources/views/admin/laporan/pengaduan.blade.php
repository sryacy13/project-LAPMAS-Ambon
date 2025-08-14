@extends('layouts.dashboard')

@section('title', 'Laporan Pengaduan')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Laporan Pengaduan</h1>

  

    <div class="mb-3">
        <a href="{{ route('admin.laporan.pengaduan.pdf') }}" class="btn btn-danger">📄 Export PDF</a>
        <a href="{{ route('admin.laporan.pengaduan.excel') }}" class="btn btn-success">📊 Export Excel</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama Pengadu</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $key => $pengaduan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pengaduan->created_at }}</td>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->judul }}</td>
                    <td>
                        @if($pengaduan->status === 'Selesai')
                            <span class="badge bg-success">Selesai</span>
                        @elseif($pengaduan->status === 'Sedang diproses')
                            <span class="badge bg-warning text-dark">Sedang diproses</span>
                        @else
                            <span class="badge bg-secondary">Belum diproses</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="btn btn-info btn-sm">👁 View</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

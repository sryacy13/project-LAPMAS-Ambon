
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengaduan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $index => $pengaduan)
                <tr>
                    <td>{{ $pengaduans->firstItem() + $index }}</td>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->judul }}</td>
                    <td>{{ $pengaduan->lokasi }}</td>
                    <td>
                        @if($pengaduan->status === 'Selesai')
                            <span class="badge bg-success">{{ $pengaduan->status }}</span>
                        @elseif($pengaduan->status === 'Sedang diproses')
                            <span class="badge bg-warning text-dark">{{ $pengaduan->status }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $pengaduan->status ?? 'Belum diproses' }}</span>
                        @endif
                    </td>@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengaduan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $index => $pengaduan)
                <tr>
                    <td>{{ $pengaduans->firstItem() + $index }}</td>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->judul }}</td>
                    <td>{{ $pengaduan->lokasi }}</td>
                    <td>
                        @if($pengaduan->status === 'Selesai')
                            <span class="badge bg-success">{{ $pengaduan->status }}</span>
                        @elseif($pengaduan->status === 'Sedang diproses')
                            <span class="badge bg-warning text-dark">{{ $pengaduan->status }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $pengaduan->status ?? 'Belum diproses' }}</span>
                        @endif
                    </td>
                    <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="btn btn-info btn-sm">Detail</a>

                        <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pengaduan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $pengaduans->links() }}
</div>
@endsection

                    <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pengaduan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $pengaduans->links() }}
</div>
@endsection

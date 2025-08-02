<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan Saya - LAPMAS Ambon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .deskripsi-text {
            white-space: normal;
            word-wrap: break-word;
            max-width: 300px;
        }
    </style>
</head>
<body class="container my-5">
    <h2 class="text-danger mb-4">Daftar Pengaduan Saya</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel pengaduan --}}
    @if($pengaduan->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Lokasi</th>
                        <th>Gambar</th>
                        <th>Tanggal Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengaduan as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td class="deskripsi-text">{{ $item->deskripsi }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Pengaduan" class="img-thumbnail" width="100">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('user.pengaduan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('user.pengaduan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Belum ada pengaduan yang Anda buat.
        </div>
    @endif

    <a href="{{ route('user.pengaduan.create') }}" class="btn btn-danger mt-3">+ Buat Pengaduan Baru</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaduan - LAPMAS Ambon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .card-pengaduan {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-pengaduan img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .badge-status {
            font-size: 12px;
        }
    </style>
</head>
<body class="container my-5">
    <h2 class="mb-4 text-danger">Pengaduan</h2>

    <!-- SEARCH BAR -->
    <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Cari pengaduan...">
        <button class="btn btn-danger">Cari</button>
    </div>

    <div class="row">
        <div class="col-md-8">
            @forelse($pengaduan as $item)
                <div class="card card-pengaduan">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Pengaduan">
                    @else
                        <img src="https://via.placeholder.com/800x400?text=No+Image" alt="Tidak ada gambar">
                    @endif
                    <div class="p-3">
                        <h5 class="fw-bold">{{ $item->judul }}</h5>
                        <p class="text-muted mb-1">{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</p>
                        <small class="text-secondary">{{ $item->created_at->format('d M Y') }}</small>
                        <div class="mt-2">
                            <span class="badge bg-success badge-status">Lingkungan</span>
                            <span class="ms-2">👍 1</span>
                            <span class="ms-2">👎 0</span>
                            <span class="ms-2">💬 0</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Belum ada pengaduan.</div>
            @endforelse
        </div>

        <!-- SIDEBAR -->
        <div class="col-md-4">
            <h5>Pengaduan Terbaru</h5>
            <ul class="list-group">
                @foreach($pengaduan->take(5) as $item)
                    <li class="list-group-item">
                        <strong>{{ \Illuminate\Support\Str::limit($item->judul, 30) }}</strong>
                        <br>
                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>

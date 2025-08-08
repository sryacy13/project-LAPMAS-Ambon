<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaduan - LAPMAS Ambon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #e63946;
            --primary-light: #f8f9fa;
            --secondary: #1d3557;
            --dark: #212529;
            --light: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: var(--dark);
        }

        .card-pengaduan {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            border: none;
            transition: all 0.3s ease;
            background-color: white;
        }

        .card-pengaduan:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card-pengaduan img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .badge-status {
            font-size: 12px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .btn-back {
            background-color: white;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: var(--primary);
            color: white;
        }

        .search-input {
            border-radius: 8px 0 0 8px;
            border-right: none;
            padding: 12px 15px;
        }

        .search-btn {
            border-radius: 0 8px 8px 0;
            padding: 12px 20px;
            background-color: var(--primary);
            border: none;
            font-weight: 500;
            color: black;
        }

        .list-group-item {
            border-radius: 8px !important;
            margin-bottom: 8px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease;
        }

        .list-group-item:hover {
            background-color: rgba(230, 57, 70, 0.05);
            border-color: rgba(230, 57, 70, 0.2);
        }

        .reaction-count {
            font-size: 14px;
            color: #6c757d;
            margin-left: 5px;
        }

        .reaction-icon {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .reaction-icon:hover {
            transform: scale(1.2);
        }

        .page-title {
            font-weight: 700;
            color: var(--primary);
            position: relative;
            padding-bottom: 10px;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
        }

        @media (max-width: 768px) {
            .card-pengaduan {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body class="container my-5">
    <!-- TOMBOL KEMBALI -->
    <a href="javascript:history.back()" class="btn btn-back mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <h2 class="mb-4 page-title">Pengaduan</h2>

    <!-- SEARCH BAR -->
    <div class="input-group mb-4 shadow-sm">
        <input type="text" class="form-control search-input" placeholder="Cari pengaduan...">
        <button class="btn search-btn text-white color-light">
            <i class="bi bi-search"></i> Cari
        </button>
    </div>

    <div class="row">
        <div class="col-md-8">
            @forelse($pengaduan as $item)
                <div class="card card-pengaduan">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Pengaduan">
                    @else
                        <img src="https://via.placeholder.com/800x400?text=No+Image" alt="Tidak ada gambar">
                    @endif
                    <div class="p-3">
                        <h5 class="fw-bold mb-2">{{ $item->judul }}</h5>
                        <p class="text-muted mb-2">{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</p>
                        <small class="text-secondary d-block mb-3">
                            <i class="bi bi-calendar me-1"></i>{{ $item->created_at->format('d M Y') }}
                        </small>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-danger badge-status">Lingkungan</span>
                            <div class="ms-auto d-flex">
                                <span class="reaction-icon">👍</span>
                                <span class="reaction-count">1</span>
                                <span class="reaction-icon ms-3">👎</span>
                                <span class="reaction-count">0</span>
                                <span class="reaction-icon ms-3">💬</span>
                                <span class="reaction-count">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info shadow-sm border-0">
                    <i class="bi bi-info-circle me-2"></i> Belum ada pengaduan.
                </div>
            @endforelse
        </div>

        <!-- SIDEBAR -->
        <div class="col-md-4">
            <h5 class="fw-bold mb-3 text-danger">Pengaduan Terbaru</h5>
            <ul class="list-group">
                @foreach ($pengaduan->take(5) as $item)
                    <li class="list-group-item shadow-sm">
                        <strong>{{ \Illuminate\Support\Str::limit($item->judul, 30) }}</strong>
                        <br>
                        <small class="text-muted">
                            <i class="bi bi-calendar me-1"></i>{{ $item->created_at->format('d M Y') }}
                        </small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>

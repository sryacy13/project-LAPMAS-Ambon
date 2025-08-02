<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">
    <h2 class="text-warning mb-4">Edit Pengaduan</h2>

    <form action="{{ route('user.pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $pengaduan->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $pengaduan->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label><br>
            @if($pengaduan->gambar)
                <img src="{{ asset('storage/' . $pengaduan->gambar) }}" width="120" class="mb-2"><br>
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('user.pengaduan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>

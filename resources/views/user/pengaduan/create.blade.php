<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Pengaduan - LAPMAS Ambon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { width: 100%; height: 300px; }
    </style>
</head>
<body>

<div class="container my-5">
    <h2 class="text-danger mb-4">Buat Pengaduan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Pengaduan</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Pengaduan" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" placeholder="Tuliskan Deskripsi Lengkap" required></textarea>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Contoh: Jl. Diponegoro No. 10" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Tandai Lokasi di Peta</label>
            <div id="map"></div>
        </div>

        <button type="submit" class="btn btn-danger">Kirim Pengaduan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-3.6547, 128.1900], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var marker = L.marker([-3.6547, 128.1900], { draggable: true }).addTo(map);

    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        document.getElementById('lokasi').value = position.lat + ', ' + position.lng;
    });
</script>
</body>
</html>

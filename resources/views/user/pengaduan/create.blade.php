<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Buat Pengaduan - LAPMAS Ambon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
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

        .container {
            max-width: 800px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        #map {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .btn-back {
            background-color: white;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 8px 15px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background-color: var(--primary);
            color: white;
        }

        .page-title {
            font-weight: 700;
            color: var(--primary);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 25px;
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

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--secondary);
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(230, 57, 70, 0.15);
        }

        .btn-submit {
            background-color: var(--primary);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 15px;
        }

        .btn-submit:hover {
            background-color: #c1121f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(230, 57, 70, 0.3);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 8px;
            border: none;
            padding: 15px;
            margin-bottom: 25px;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
        }

        .file-upload-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .file-upload-label {
            display: block;
            padding: 12px;
            background-color: #f8f9fa;
            border: 1px dashed #e0e0e0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            border-color: var(--primary);
            background-color: rgba(230, 57, 70, 0.05);
        }

        .leaflet-container {
            font-family: 'Poppins', sans-serif !important;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin-top: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container my-5">

        <!-- TOMBOL KEMBALI -->
        <a href="javascript:history.back()" class="btn btn-back">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <h2 class="page-title">Buat Pengaduan</h2>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="judul" class="form-label">Judul Pengaduan</label>
                <input type="text" name="judul" id="judul" class="form-control"
                    placeholder="Masukkan judul pengaduan" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"
                    placeholder="Jelaskan pengaduan Anda secara detail" required></textarea>
            </div>

            <div class="mb-4">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control"
                    placeholder="Cari atau tandai lokasi di peta" required>
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <div class="file-upload">
                    <label class="file-upload-label" for="gambar">
                        <i class="bi bi-cloud-arrow-up fs-3"></i>
                        <div class="mt-2">Klik untuk mengunggah gambar</div>
                        <small class="text-muted">Format: JPG, PNG (Maks. 5MB)</small>
                    </label>
                    <input type="file" name="gambar" id="gambar" class="file-upload-input">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Tandai Lokasi di Peta</label>
                <div id="map"></div>
            </div>

            <button type="submit" class="btn btn-submit">
                <i class="bi bi-send-fill me-2"></i>Kirim Pengaduan
            </button>
        </form>
    </div>

    <script>
        var map = L.map('map').setView([-3.6547, 128.1900], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker = L.marker([-3.6547, 128.1900], {
            draggable: true
        }).addTo(map);

        // Update input lokasi ketika marker digeser
        marker.on('dragend', function() {
            var position = marker.getLatLng();
            document.getElementById('lokasi').value = position.lat + ', ' + position.lng;
        });

        // Fitur search lokasi (geocoding)
        document.getElementById('lokasi').addEventListener('change', function() {
            var query = this.value;
            if (query.length > 3) {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            var lat = parseFloat(data[0].lat);
                            var lon = parseFloat(data[0].lon);
                            map.setView([lat, lon], 15);
                            marker.setLatLng([lat, lon]);
                        } else {
                            alert('Lokasi tidak ditemukan');
                        }
                    });
            }
        });
    </script>

</body>

</html>

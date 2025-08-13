<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard - LAPMAS Ambon</title>

  {{-- Bootstrap CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

  {{-- Leaflet CSS --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <style>
    #map {
      width: 100%;
      height: 500px;
    }
    .profile-icon {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- ✅ NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-danger" href="{{ route('user.dashboard') }}">LAPMAS AMBON</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('user.dashboard') }}">Home</a>
          </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('user.pengaduan.all') }}">Daftar Pengaduan</a>
        </li>
          <li class="nav-item">
  <a class="nav-link text-dark" href="{{ route('user.pengaduan.index') }}">Pengaduan Saya</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark" href="{{ route('user.pengaduan.create') }}">Buat Pengaduan</a>
</li>

          <!-- ✅ Dropdown Profil -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('img/profile.png') }}" alt="User" class="profile-icon me-2">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
          <!-- ✅ END -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- ✅ HERO SECTION -->
  <section class="bg-danger text-white py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1>Layanan Pengaduan Masyarakat Ambon Secara Online</h1>
          <p>Sampaikan laporan masalah anda di sini, kami akan menanganinya dengan cepat.</p>
          <a href="{{ route('user.pengaduan.create') }}" class="btn btn-warning">Buat Pengaduan</a>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
  <div class="card shadow-lg border-0" st yle="width: 100%; max-width: 350px; border-radius: 1rem;">
    <div class="card-body text-center">
      <img src="{{ asset('img/gambar2.png') }}" alt="Ilustrasi Pengaduan" class="img-fluid rounded" style="max-height: 250px; object-fit: cover;">
    </div>
  </div>
</div>

      </div>
    </div>
  </section>

  <!-- ✅ PETA PENGADUAN -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-danger mb-4">Peta Pengaduan</h2>
      <div id="map"></div>
    </div>
  </section>

  <!-- ✅ SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  // Koordinat lokasi pengaduan
  const latitude = -3.6547;
  const longitude = 128.1900;

  // Inisialisasi Peta
  var map = L.map('map').setView([latitude, longitude], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
  }).addTo(map);

  // Marker dengan popup yang diperindah
  L.marker([latitude, longitude]).addTo(map)
    .bindPopup(`
      <div style="font-family: Arial, sans-serif;">
      <strong>Sampah Menumpuk di Pinggir Jalan</strong><br/>
      Terdapat tumpukan sampah yang belum diangkut di area ini. Mohon segera dilakukan penanganan untuk menjaga kebersihan lingkungan.<br/>
      <a href="https://www.google.com/maps/dir/?api=1&destination=${latitude},${longitude}" 
         target="_blank" 
         style="display: inline-block; margin-top: 6px; padding: 4px 12px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 5px;">
         Rute
      </a>
    </div>
     
    `)
    .openPopup();
</script>


</body>
</html>

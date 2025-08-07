<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard - LAPMAS Ambon</title>

  {{-- Bootstrap CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>
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
              <li><a class="dropdown-item" href="#">Profil Saya</a></li>
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
          <div class="card shadow-lg border-0" style="width: 100%; max-width: 350px; border-radius: 1rem;">
            <div class="card-body text-center">
              <img src="{{ asset('img/gambar2.png') }}" alt="Ilustrasi Pengaduan" class="img-fluid rounded" style="max-height: 250px; object-fit: cover;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ✅ GALERI PENGADUAN -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-danger mb-4">Galeri Pengaduan</h2>
      <div class="row g-4">

        <!-- Pengaduan 1 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100">
            <img src="{{ asset('img/image4.png') }}" class="card-img-top" alt="Sampah di jalan">
            <div class="card-body">
              <h5 class="card-title">Sampah Menumpuk di Jalan Raya</h5>
              <p class="card-text text-muted small">Kelurahan Batu Merah</p>
            </div>
          </div>
        </div>

        <!-- Pengaduan 2 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100">
           <img src="{{ asset('img/image5.png') }}" class="card-img-top" alt="Jalan rusak">

            <div class="card-body">
              <h5 class="card-title">Jalan Berlubang dan Berbahaya</h5>
              <p class="card-text text-muted small">Kecamatan Sirimau</p>
            </div>
          </div>
        </div>

        <!-- Pengaduan 3 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100">
            <img src="{{ asset('img/image.png') }}" class="card-img-top" alt="Lampu mati">
            <div class="card-body">
              <h5 class="card-title">Lampu Jalan Tidak Menyala</h5>
              <p class="card-text text-muted small">Jln. Pattimura</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Tombol lihat semua -->
      <div class="text-center mt-4">
        <a href="{{ route('user.pengaduan.all') }}" class="btn btn-outline-danger">Lihat Semua Pengaduan</a>
      </div>
    </div>
  </section>

  <!-- ✅ SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

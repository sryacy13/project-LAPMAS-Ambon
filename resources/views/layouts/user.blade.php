<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard - LAPMAS Ambon</title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            color: var(--dark);
            background-color: #f5f5f5;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid var(--primary);
        }

        .navbar {
            padding: 15px 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            background-color: white !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 500;
            padding: 8px 15px !important;
            margin: 0 5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(230, 57, 70, 0.1);
            color: var(--primary) !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 10px 0;
        }

        .dropdown-item {
            padding: 8px 20px;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: rgba(230, 57, 70, 0.1);
            color: var(--primary);
        }

        .hero-section {
            background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Q50,80 0,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .hero-content h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .hero-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .btn-primary-custom {
            background-color: white;
            color: var(--primary);
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .hero-image-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            border: none;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .hero-image-card:hover {
            transform: translateY(-5px);
        }

        .section-title {
            font-weight: 700;
            color: var(--primary);
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
        }

        .gallery-section {
            padding: 80px 0;
            background-color: white;
        }

        .card-custom {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-text {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn-outline-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: var(--primary);
            color: white;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-section::before {
                width: 100%;
                opacity: 0.2;
            }
        }
    </style>
</head>

<body>

    <!-- Modern Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                <span class="text-primary">LAPMAS</span> AMBON
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.pengaduan.all') }}">Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.pengaduan.index') }}">Pengaduan Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.pengaduan.create') }}">Buat Pengaduan</a>
                    </li>

                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/profile.png') }}" alt="User" class="profile-icon me-2">
                            <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil Saya</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content pe-lg-5">
                        <h1>Layanan Pengaduan Masyarakat Ambon Secara Online</h1>
                        <p>Sampaikan laporan masalah Anda di sini, kami akan menanganinya dengan cepat dan transparan
                            untuk kenyamanan bersama.</p>
                        <div class="d-flex gap-3">
                            <a href="{{ route('user.pengaduan.create') }}" class="btn btn-primary-custom">
                                <i class="bi bi-plus-circle me-2"></i>Buat Pengaduan
                            </a>
                            <a href="{{ route('user.pengaduan.all') }}" class="btn btn-outline-light rounded-pill">
                                <i class="bi bi-eye me-2"></i>Lihat Pengaduan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="hero-image-card">
                        <div class="card-body p-0">
                            <img src="{{ asset('img/gambar2.png') }}" alt="Ilustrasi Pengaduan"
                                class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h4>Cepat</h4>
                        <p class="mb-0">Proses pengaduan yang cepat dan efisien untuk solusi tepat waktu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Aman</h4>
                        <p class="mb-0">Data dan identitas Anda terlindungi dengan sistem keamanan terbaik</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h4>Transparan</h4>
                        <p class="mb-0">Proses yang terbuka dan dapat dipantau setiap saat oleh masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Galeri Pengaduan</h2>
            <p class="mb-5">Beberapa pengaduan terbaru dari masyarakat Ambon</p>

            <div class="row g-4">
                <!-- Pengaduan 1 -->
                <div class="col-md-4">
                    <div class="card-custom">
                        <img src="{{ asset('img/image4.png') }}" class="card-img-top" alt="Sampah di jalan">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-danger">Dalam Proses</span>
                                <small class="text-muted">2 hari lalu</small>
                            </div>
                            <h5 class="card-title">Sampah Menumpuk di Jalan Raya</h5>
                            <p class="card-text">Kelurahan Batu Merah, tumpukan sampah mengganggu aktivitas warga.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small"><i class="bi bi-person me-1"></i>John Doe</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengaduan 2 -->
                <div class="col-md-4">
                    <div class="card-custom">
                        <img src="{{ asset('img/image5.png') }}" class="card-img-top" alt="Jalan rusak">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-warning text-dark">Ditindaklanjuti</span>
                                <small class="text-muted">1 minggu lalu</small>
                            </div>
                            <h5 class="card-title">Jalan Berlubang dan Berbahaya</h5>
                            <p class="card-text">Kecamatan Sirimau, kondisi jalan yang membahayakan pengendara.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small"><i class="bi bi-person me-1"></i>Jane Smith</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengaduan 3 -->
                <div class="col-md-4">
                    <div class="card-custom">
                        <img src="{{ asset('img/image.png') }}" class="card-img-top" alt="Lampu mati">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-success">Selesai</span>
                                <small class="text-muted">3 minggu lalu</small>
                            </div>
                            <h5 class="card-title">Lampu Jalan Tidak Menyala</h5>
                            <p class="card-text">Jln. Pattimura, kondisi gelap mengundang tindak kriminalitas.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small"><i class="bi bi-person me-1"></i>Robert Johnson</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="{{ route('user.pengaduan.all') }}" class="btn btn-outline-custom">
                    <i class="bi bi-grid me-2"></i>Lihat Semua Pengaduan
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-primary mb-4">LAPMAS AMBON</h5>
                    <p>Layanan Pengaduan Masyarakat Kota Ambon yang cepat, aman, dan transparan untuk kenyamanan
                        bersama.</p>
                    <div class="social-icons mt-4">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6 class="text-primary mb-4">Tautan</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('user.dashboard') }}"
                                class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="{{ route('user.pengaduan.all') }}"
                                class="text-white text-decoration-none">Daftar Pengaduan</a></li>
                        <li class="mb-2"><a href="{{ route('user.pengaduan.index') }}"
                                class="text-white text-decoration-none">Pengaduan Saya</a></li>
                        <li class="mb-2"><a href="{{ route('user.pengaduan.create') }}"
                                class="text-white text-decoration-none">Buat Pengaduan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h6 class="text-primary mb-4">Kontak</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> Jl. Pattimura, Ambon</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> (0910) 1234567</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> info@lapmas-ambon.go.id</li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-primary mb-4">Jam Operasional</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">Senin - Jumat: 08.00 - 16.00</li>
                        <li class="mb-2">Sabtu: 08.00 - 14.00</li>
                        <li>Minggu & Hari Libur: Tutup</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 LAPMAS Ambon. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Made with <i class="bi bi-heart-fill text-danger"></i> for Ambon City</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add active class to current nav link
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LAPMAS Ambon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .bg-header {
            background: url('{{ asset('img/kotaambon.jpg') }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
            color: white;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .header-content {
            position: relative;
            z-index: 2;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .navbar-brand img {
            height: 40px;
        }

        .btn-read-more {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .btn-read-more:hover {
            background-color: white;
            color: black;
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo P-MAS Ambon" class="me-2">
                <strong>LAPMAS Ambon</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main class="mt-5">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>

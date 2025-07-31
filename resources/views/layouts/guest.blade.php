<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? 'Guest' }}</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2, #f78ca0);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Figtree', sans-serif;
        }

        .card-container {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-in-out;
        }

        .logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.4);
        }

        .title {
            color: #4c51bf;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .subtitle {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .footer {
            margin-top: 1.5rem;
            font-size: 0.75rem;
            color: #d1d5db;
            text-align: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="card-container text-center">
        <!-- Logo -->
        <div class="mb-4">
            <img src="{{ asset('img/download.png') }}" alt="Logo" class="logo mx-auto mb-3">
            <h1 class="title">{{ $heading ?? 'Selamat Datang' }}</h1>
            <p class="subtitle">{{ $subheading ?? 'Silakan login atau daftar' }}</p>
        </div>

        <!-- Content -->
        <div class="mt-4">
            @yield('content')

            @guest
            <div class="mt-6 flex justify-between gap-3">
                <!-- Tombol Login (Biru) -->
                <a href="{{ route('login') }}"
                   class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 text-center">
                    Login
                </a>

                <!-- Tombol Daftar (Hijau) -->
                <a href="{{ route('register') }}"
                   class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-300 text-center">
                    Daftar
                </a>
            </div>
            @endguest
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>

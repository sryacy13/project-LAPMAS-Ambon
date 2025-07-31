<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - {{ config('app.name') }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2, #f78ca0);
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

<div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-lg animate-fade-in">

      <!-- Logo & Judul -->
<div class="text-center mb-6">
    <img src="{{ asset('img/download.png') }}" class="w-20 h-20 mx-auto mb-2 rounded-full shadow-md" alt="Logo Pemkot Ambon">
    <h1 class="text-2xl font-bold text-indigo-700">Daftar Akun Pengaduan</h1>
    <p class="text-sm text-gray-500">Silakan isi data diri Anda untuk mengakses sistem pengaduan masyarakat Kota Ambon</p>
</div>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autocomplete="username"
                       class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" name="password" id="password" required autocomplete="new-password"
                       class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Tombol Register -->
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md flex items-center justify-center shadow-md transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4v16m8-8H4"></path>
                </svg>
                Daftar
            </button>

            <!-- Link ke Login -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login Sekarang</a>
            </p>
        </form>
    </div>

</body>
</html>

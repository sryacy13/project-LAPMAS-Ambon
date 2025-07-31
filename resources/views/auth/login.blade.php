<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>

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
       <div class="text-center mb-6">
    <img src="{{ asset('img/download.png') }}" class="w-20 h-20 mx-auto mb-2 rounded-full shadow-md" alt="Logo Pemkot Ambon">
    <h1 class="text-2xl font-bold text-indigo-700">Masuk ke Sistem Pengaduan</h1>
    <p class="text-sm text-gray-500">Silakan login untuk mengakses layanan pengaduan masyarakat Kota Ambon</p>
</div>


        <!-- Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" autocomplete="username" required
                       class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" name="password" id="password" autocomplete="current-password" required
                       class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember & Lupa Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 rounded border-gray-300">
                    <span>Ingat Saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md flex items-center justify-center shadow-md transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                Login
            </button>

            <!-- Link ke Register -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-green-600 hover:underline font-medium">Daftar Sekarang</a>
            </p>
        </form>
    </div>

</body>
</html>

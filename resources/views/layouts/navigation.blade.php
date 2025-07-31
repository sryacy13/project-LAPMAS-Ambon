<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo / Brand -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="h-8 w-8">
                    <span class="font-bold text-lg text-gray-800"> P-MAS Ambon</span>
                </a>
            </div>

            <!-- Menu Utama (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-green-600 font-medium">Register</a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Login</a>
                <a href="#kontak" class="text-gray-700 hover:text-red-600 font-medium">Kontak</a>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu (Mobile) -->
    <div x-show="open" class="sm:hidden px-4 pt-2 pb-4 space-y-1">
        <a href="{{ url('/') }}" class="block text-gray-700 hover:text-blue-600">Home</a>
        <a href="{{ route('register') }}" class="block text-gray-700 hover:text-green-600">Register</a>
        <a href="{{ route('login') }}" class="block text-gray-700 hover:text-indigo-600">Login</a>
        <a href="#kontak" class="block text-gray-700 hover:text-red-600">Kontak</a>
    </div>
</nav>

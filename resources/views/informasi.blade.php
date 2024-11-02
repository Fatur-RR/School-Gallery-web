<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>SMKN 4 BOGOR</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO SMKN 4.png') }}">
</head>
<body>

<div class="bg-white">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <!-- Menu Links for large screens only -->
            <div class="hidden lg:flex lg:flex-1">
                <div class="flex gap-x-11">
                    <a href="{{ route('welcome') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                    <a href="{{ route('informasi') }}" class="text-sm font-semibold leading-6 text-gray-900">Informasi</a>
                    <a href="{{ route('agenda') }}" class="text-sm font-semibold leading-6 text-gray-900">Agenda</a>
                    <a href="{{ route('album') }}" class="text-sm font-semibold leading-6 text-gray-900">Album</a>
                    <a href="{{ route('gallery') }}" class="text-sm font-semibold leading-6 text-gray-900">Gallery</a>
                </div>
            </div>

            <!-- Hamburger menu button for mobile -->
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Logo in center for all screen sizes -->
            <div class="flex justify-center items-center flex-1">
                <a href="{{ route('welcome') }}" class="-m-1.5 p-1.5 flex items-center">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="{{ asset('images/LOGO SMKN 4.png') }}" alt="Logo">
                    <span class="ml-3 text-lg font-bold">SMKN 4 BOGOR</span>
                </a>
            </div>

            <!-- Login/Register and Search for large screens -->
            <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center space-x-4">
                {{-- <form class="flex items-center">
                    <input type="text" class="border border-gray-300 rounded-full py-2 px-4 w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Search..." aria-label="Search">
                    <button type="submit" class="ml-2 bg-indigo-600 text-white rounded-full py-2 px-4 hover:bg-indigo-700 transition duration-200">Search</button>
                </form> --}}

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Dashboard<span aria-hidden="true">&rarr;</span></a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in<span aria-hidden="true">&rarr;</span></a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-gray-900">Register<span aria-hidden="true">&rarr;</span></a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>


        <!-- Mobile menu -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="space-y-2 px-6 py-3 bg-gray-50">
                {{-- <form class="flex items-center mb-4">
                    <input type="text" class="border rounded-lg py-1 px-3 flex-grow" placeholder="Search..." aria-label="Search">
                    <button type="submit" class="ml-2 bg-indigo-600 text-white rounded-lg py-1 px-4">Search</button>
                </form> --}}
                <a href="{{ route('welcome') }}" class="block text-base font-semibold text-gray-900">Home</a>
                <a href="{{ route('informasi') }}" class="block text-base font-semibold text-gray-900">Informasi</a>
                <a href="{{ route('agenda') }}" class="block text-base font-semibold text-gray-900">Agenda</a>
                <a href="{{ route('album') }}" class="block text-base font-semibold text-gray-900">Album</a>
                <a href="{{ route('gallery') }}" class="block text-base font-semibold text-gray-900">Gallery</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block text-base font-semibold text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block text-base font-semibold text-gray-900">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block text-base font-semibold text-gray-900">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 text-center">
        <h1 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-6xl">Kumpulan Informasi</h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Informasi terkini</p>

        <form class="mt-8" method="GET" action="{{ route('informasi') }}">
            <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" type="text" name="search" value="{{ request('search') }}" placeholder="Cari informasi...">
        </form>
    </div>
</div>

<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($informasis as $post)
        <div class="bg-white shadow-lg rounded-lg p-4 mb-6 max-w-md mx-auto transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-gray-100 hover:border hover:border-indigo-500">
            <h2 class="text-xl font-bold mb-2 break-words">{{ $post->judul }}</h2> <!-- Tambahkan 'break-words' untuk memecah teks panjang -->
            <img class="w-full h-auto rounded-lg mb-4" src="{{ asset('storage/' . $post->file) }}" alt="Gambar untuk {{ $post->judul }}">
            <p class="text-gray-700 mb-2 break-words">Isi: {{ $post->isi }}</p> <!-- 'break-words' juga untuk isi teks -->
            <p class="text-gray-700 mb-2">Status: {{ $post->status }}</p>
            <p class="text-gray-700 mb-2">Dibuat pada: {{ $post->created_at->format('d-m-Y H:i') }}</p>
        </div>
        @endforeach
    </div>
</div>

</div>




</body>
<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
  </script>
</html>

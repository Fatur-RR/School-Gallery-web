<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }

        /* Atur lebar dan tinggi card */
    </style>


    <title>SMKN 4 BOGOR</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO SMKN 4.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <!-- Menu Links for large screens only -->
                <div class="hidden lg:flex lg:flex-1">
                    <div class="flex gap-x-11">
                        <a href="{{ route('welcome') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                        <a href="{{ route('informasi') }}"
                            class="text-sm font-semibold leading-6 text-gray-900">Informasi</a>
                        <a href="{{ route('agenda') }}" class="text-sm font-semibold leading-6 text-gray-900">Agenda</a>
                        <a href="{{ route('album') }}" class="text-sm font-semibold leading-6 text-gray-900">Album</a>
                        <a href="{{ route('gallery') }}"
                            class="text-sm font-semibold leading-6 text-gray-900">Gallery</a>

                    </div>
                </div>

                <!-- Hamburger menu button for mobile -->
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                        id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
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
                        <input type="text"
                            class="border border-gray-300 rounded-full py-2 px-4 w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="Search..." aria-label="Search">
                        <button type="submit" class="ml-2 bg-indigo-600 text-white rounded-full py-2 px-4 hover:bg-indigo-700 transition duration-200">Search</button>
                    </form> --}}

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm font-semibold leading-6 text-gray-900">Dashboard<span
                                    aria-hidden="true">&rarr;</span></a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in<span
                                    aria-hidden="true">&rarr;</span></a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-sm font-semibold leading-6 text-gray-900">Register<span
                                        aria-hidden="true">&rarr;</span></a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>


            <!-- Mobile menu -->
            <div class="lg:hidden hidden" id="mobile-menu">
                <div class="space-y-2 px-6 py-3 bg-gray-50">
                    <form class="flex items-center mb-4">
                        {{-- <input type="text" class="border rounded-lg py-1 px-3 flex-grow" placeholder="Search..."
                            aria-label="Search">
                        <button type="submit"
                            class="ml-2 bg-indigo-600 text-white rounded-lg py-1 px-4">Search</button> --}}
                    </form>
                    <a href="{{ route('welcome') }}" class="block text-base font-semibold text-gray-900">Home</a>
                    <a href="{{ route('informasi') }}"
                        class="block text-base font-semibold text-gray-900">Informasi</a>
                    <a href="{{ route('agenda') }}" class="block text-base font-semibold text-gray-900">Agenda</a>
                    <a href="{{ route('album') }}" class="block text-base font-semibold text-gray-900">Album</a>
                    <a href="{{ route('gallery') }}" class="block text-base font-semibold text-gray-900">Gallery</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="block text-base font-semibold text-gray-900">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="block text-base font-semibold text-gray-900">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="block text-base font-semibold text-gray-900">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>



        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="hidden sm:mb-10 -mt-20 sm:flex sm:justify-center ">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Berita berita terkini <a href="{{ route('informasi') }}" class="font-semibold text-indigo-600"><span
                                class="absolute inset-0" aria-hidden="true"></span>Read more <span
                                aria-hidden="true"></span></a>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-6xl">Welcome To Gallery SMKN 4
                        Bogor</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Kumpulan foto foto dokumentasi SMKN 4 BOGOR</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        {{-- <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a> --}}
                        {{-- <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a> --}}
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>

        <div class="py-0 bg-transparent">
            <div class="swiper mySwiper container mx-auto -mt-20 pb-5">
                <div class="swiper-wrapper">
                    @foreach ($informasis->sortByDesc('created_at')->take(5) as $Get)
                        <!-- Ambil 5 data terbaru -->
                        <div class="swiper-slide relative w-full h-64"> <!-- Atur tinggi card agar sama -->
                            <img src="{{ asset('storage/' . $Get->file) }}" alt="{{ $Get->judul }}" class="w-full h-full object-cover mx-auto rounded-lg shadow-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center p-4 text-white rounded-lg">
                                <h2 class="text-lg font-bold">{{ $Get->judul }}</h2>
                                <p class="text-sm mt-2 break-words">{!! nl2br(e($Get->ringkasan)) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>





            <div class="container mx-auto my-10 p-4">
                <div class="text-center">
                    <h2 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-4xl mb-8">Foto</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($fotos->sortByDesc('created_at')->take(10) as $Get)
                        <!-- Ambil 10 data terbaru -->
                        <!-- Card 1 -->
                        <div class="relative group w-full h-64 shadow-lg rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $Get->file) }}" alt="{{ $Get->judul }}"
                                class="w-full h-full object-cover rounded-lg">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 rounded-lg p-4 transition-opacity duration-300">
                                <h2 class="text-xl font-bold text-white">{{ $Get->judul }}</h2>
                                <p class="text-white mt-2">{{ $Get->created_at }}</p>
                                {{-- <button data-id="{{ $Get->FotoID }}" class="mt-4 bg-indigo-600 text-white rounded-lg py-2 px-4 hover:bg-indigo-700 transition duration-200 open-modal">
                                    Detail
                                </button> --}}
                            </div>
                        </div>

                        {{-- <div id="detail-modal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-75 z-50 flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                                <h2 id="modal-title" class="text-2xl font-bold mb-4"></h2>
                                <img id="modal-image" class="w-full h-auto max-h-96 object-contain rounded-lg mb-4"  src="" alt="">
                                <p id="modal-description" class="text-gray-600 mb-4"></p>
                                <p id="modal-date" class="text-gray-500 text-sm mb-4"></p>
                                <!-- Tambahkan elemen album secara permanen di modal -->
                                <p id="modal-album" class="text-gray-500 text-sm mb-4"></p>
                                <button id="close-modal" class="mt-4 bg-indigo-600 text-white rounded-lg py-2 px-4 hover:bg-indigo-700 transition duration-200">
                                    Close
                                </button>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
                <div class="flex justify-center mt-8">
                    <a href="{{ route('gallery') }}"
                        class="rounded-full border border-indigo-600 bg-transparent px-6 py-3 text-base font-semibold text-indigo-600 shadow-sm hover:bg-indigo-500 hover:text-white hover:border-transparent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        See More
                    </a>
                </div>
            </div>


            <div class="w-full max-w-3xl mx-auto bg-white border border-gray-300 rounded-lg shadow-md p-6 mt-10 mb-6">
                <h3 class="text-2xl font-semibold mb-4 text-gray-800 text-center border-b border-gray-300 pb-2">Agenda
                    Sekolah</h3>
                <ul class="divide-y divide-gray-200">
                    @foreach ($agendas as $Get)
                        <li class="py-4 flex justify-between items-center">
                            <div>
                                <div class="text-lg font-medium text-gray-900">{{ $Get->judul }}</div>
                                <div class="text-sm text-gray-500">{{ $Get->isi }}</div>
                                <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $Get->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $Get->status }}</div>
                                <div class="text-sm text-gray-500">{{ $Get->updated_at }}</div>
                            </div>
                            <button
                                class="text-indigo-600 font-semibold hover:text-indigo-800 transition duration-200 z-20 relative"
                                onclick="openModal({{ $Get->id }})">Detail</button>
                        </li>

                        <!-- Modal -->
                        <div id="modal-{{ $Get->id }}"
                            class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full relative">
                                <h2 class="text-xl font-semibold mb-4 text-gray-800">{{ $Get->judul }}</h2>
                                <p class="text-gray-700 mb-4">{{ $Get->isi }}</p>
                                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $Get->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $Get->status }}</p>
                                <p class="text-sm text-gray-500 mb-4">Diperbarui pada: {{ $Get->updated_at }}</p>
                                <button onclick="closeModal({{ $Get->id }})"
                                    class="mt-4 bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition duration-200">Tutup</button>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>

            <div class="max-w-full mx-auto p-6 bg-gray-100 shadow-md rounded-lg border border-gray-300">
                <!-- Bagian Keterangan -->
                <div class="relative isolate px-6 pt-14 lg:px-8">
                    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                        aria-hidden="true">
                        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                        </div>
                    </div>
                    <div class="text-center">
                        <h2 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-4xl mb-8">Denah Sekolah
                        </h2>
                    </div>

                    <!-- Bagian Gambar dan Keterangan dalam Flexbox -->
                    <div
                        class="flex flex-col lg:flex-row items-center justify-center space-y-6 lg:space-y-0 lg:space-x-8">
                        <!-- Bagian Gambar Peta dengan ukuran terbatas dan shadow -->
                        <div class="w-full lg:w-1/2 max-w-2xl">
                            @if ($fotosByJudul->isNotEmpty())
                                <img src="{{ asset('storage/' . $fotosByJudul->first()->file) }}" alt="Peta Sekolah"
                                    class="w-full h-auto rounded-md object-cover shadow-lg">
                            @else
                                <p class="text-gray-600 mt-2">Tidak ada gambar yang tersedia untuk judul ini.</p>
                            @endif
                        </div>

                        <!-- Bagian Keterangan Peta -->
                        <div class="w-full lg:w-1/2 max-w-2xl">
                            @if ($fotosByJudul->isNotEmpty())
                                <h3 class="text-2xl font-semibold text-gray-800">{{ $fotosByJudul->first()->judul }}
                                </h3>
                                <p class="text-gray-600 mt-2">{!! nl2br(e($fotosByJudul->first()->deskripsi)) !!}</p>
                            @endif
                        </div>
                    </div>

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

    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }

    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: {{ count($fotos) > 1 ? 'true' : 'false' }}, // Loop hanya aktif jika ada lebih dari 1 gambar
        autoplay: {
            delay: 0, // Set delay to 0 for continuous sliding
            disableOnInteraction: false, // Keeps autoplay running even after user interaction
        },
        speed: 3000, // Set speed for smooth transitions (3 seconds per slide)
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },
    });
</script>



</html>

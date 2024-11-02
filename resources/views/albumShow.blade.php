<!DOCTYPE html>
<html lang="en">
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

    <div class="mx-auto max-w-7xl py-12 px-6">
        <!-- Button Back -->
        <a href="{{ route('album') }}" class="inline-block mb-6 bg-gray-600 text-white rounded-full py-2 px-4 hover:bg-gray-700 transition duration-200">
            &larr; Kembali ke Album
        </a>

        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <h2 class="text-3xl font-semibold text-gray-900 mb-6">{{ $album->Nama }}</h2>
        <p class="text-gray-600 mb-4">{{ $album->Deskripsi }}</p>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($album->fotos as $foto)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $foto->file) }}" alt="Foto dalam album {{ $album->Nama }}" class="h-48 w-full object-cover">
                </div>
            @endforeach
        </div>
    </div>


    {{-- <div class="mx-auto max-w-7xl py-12 px-6">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6">{{ $album->Nama }}</h2>
        <p class="text-gray-600 mb-4">{{ $album->Deskripsi }}</p>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($album->fotos as $foto)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $foto->file) }}" alt="Foto dalam album {{ $album->Nama }}" class="h-48 w-full object-cover">
                </div>
            @endforeach
        </div>
    </div> --}}
</body>
</html>


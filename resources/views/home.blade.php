<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB ANOMALI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .nav-link {
            @apply text-gray-700 font-medium hover:text-green-600 transition duration-300;
        }

        .nav-link.active {
            @apply text-green-600 font-semibold;
        }

        .carousel-container {
            width: 100%;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .carousel-container {
                width: 83.333333%;
            }
        }

        /* Efek teks mengambang halus */
        h2 span {
            display: inline-block;
            animation: floatText 3s ease-in-out infinite alternate;
        }

        h2 span:nth-child(2) {
            animation-delay: 0.5s;
        }

        @keyframes floatText {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-5px);
            }
        }

        /* Efek tombol lebih hidup */
        a:hover {
            box-shadow: 0 10px 20px -5px rgba(74, 222, 128, 0.4);
        }

        /* Custom scrollbar for carousel */
        #carousel-track::-webkit-scrollbar {
            display: none;
        }

        /* Smooth hover transitions */
        .transition-all {
            transition-property: all;
        }

        .duration-300 {
            transition-duration: 300ms;
        }
    </style>


</head>

<body class="font-sans bg-gray-50 scroll-smooth">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Hero Section -->
    <section id="beranda" class="relative bg-cover bg-center h-screen"
        style="background-image: url('https://images.unsplash.com/photo-1704120726945-4f3dfa9db262?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

        <!-- Gradient overlay dengan efek lebih halus -->
        <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-teal-900/70 to-blue-900/80"></div>

        <div class="relative flex items-center justify-center h-full px-4 text-center">
            <div class="max-w-3xl">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    <span
                        class="inline-block bg-clip-text text-transparent bg-gradient-to-r from-green-300 to-teal-200">
                        Pelayanan Terbaik
                    </span><br>
                    <span class="drop-shadow-lg">untuk Hewan Kesayangan Anda</span>
                </h2>

                <p class="text-white/90 text-xl md:text-2xl mb-8 max-w-2xl mx-auto leading-relaxed font-light">
                    Kami siap membantu menjaga kesehatan hewan peliharaan Anda dengan layanan profesional dan penuh
                    kasih.
                </p>

                <a href="{{ route('services') }}"
                    class="inline-block bg-gradient-to-r from-green-400 to-teal-500 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:-translate-y-1 transition-all duration-300 shadow-md">
                    Buat Janji Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Fitur Layanan -->
    <section id="layanan" class="py-20 bg-gradient-to-b from-white to-green-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-3 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Layanan
                    Unggulan</span>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Perawatan <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Komprehensif</span>
                </h3>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">Kami menyediakan berbagai layanan profesional untuk
                    menjaga kesehatan dan kebahagiaan hewan kesayangan Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div
                    class="relative group overflow-hidden bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-100 to-white opacity-90"></div>
                    <div class="relative p-8">
                        <div
                            class="w-16 h-16 mb-6 rounded-lg bg-green-500/10 flex items-center justify-center text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Pemeriksaan Umum</h4>
                        <p class="text-gray-600 mb-6">Diagnosa dan pemeriksaan menyeluruh untuk mendeteksi masalah
                            kesehatan sejak dini.</p>
                        <div class="text-green-600 font-medium flex items-center group-hover:text-green-700 transition">
                            Pelajari lebih lanjut
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-1 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div
                    class="relative group overflow-hidden bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-white opacity-90"></div>
                    <div class="relative p-8">
                        <div
                            class="w-16 h-16 mb-6 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Vaksinasi</h4>
                        <p class="text-gray-600 mb-6">Program vaksin lengkap untuk melindungi hewan peliharaan dari
                            berbagai penyakit berbahaya.</p>
                        <div class="text-blue-600 font-medium flex items-center group-hover:text-blue-700 transition">
                            Pelajari lebih lanjut
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-1 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div
                    class="relative group overflow-hidden bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-100 to-white opacity-90"></div>
                    <div class="relative p-8">
                        <div
                            class="w-16 h-16 mb-6 rounded-lg bg-teal-500/10 flex items-center justify-center text-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Grooming</h4>
                        <p class="text-gray-600 mb-6">Perawatan profesional untuk menjaga kebersihan dan penampilan
                            hewan kesayangan Anda.</p>
                        <div class="text-teal-600 font-medium flex items-center group-hover:text-teal-700 transition">
                            Pelajari lebih lanjut
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-1 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Dokter -->
    <section id="dokter" class="py-20 bg-gradient-to-b from-white to-green-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Tim
                    Profesional</span>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Dokter <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Berkualitas</span>
                </h3>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">Tim dokter hewan berpengalaman yang siap memberikan
                    perawatan terbaik untuk hewan kesayangan Anda.</p>
            </div>

            @if ($dokters->count() > 0)
                <div class="relative">
                    <!-- Carousel Container -->
                    <div class="overflow-hidden px-2">
                        <div class="flex space-x-8 transition-transform duration-500 ease-in-out" id="carousel-track">
                            @foreach ($dokters as $dokter)
                                <div class="min-w-[300px] flex-shrink-0">
                                    <div
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group h-full flex flex-col">
                                        <!-- Doctor Image -->
                                        <div class="relative overflow-hidden h-48">
                                            <img src="{{ $dokter->image ? Storage::url($dokter->image) : 'https://ui-avatars.com/api/?name=' . urlencode($dokter->name) }}"
                                                alt="{{ $dokter->name }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent">
                                            </div>
                                        </div>

                                        <!-- Doctor Info -->
                                        <div class="p-6 flex-grow">
                                            <h4 class="font-bold text-xl text-gray-900 mb-1">{{ $dokter->name }}</h4>
                                            <p class="text-green-600 font-medium mb-3">
                                                {{ $dokter->doctor->specialization ?? '-' }}
                                            </p>
                                            @if (!empty($dokter->doctor->description))
                                                <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                                                    {{ $dokter->doctor->description }}</p>
                                            @endif
                                        </div>

                                        <!-- Button -->
                                        <div class="px-6 pb-6">
                                            <button
                                                class="w-full bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 text-white px-6 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform group-hover:-translate-y-1 shadow-md hover:shadow-lg">
                                                Lihat Profil
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Buttons - Only show if more than 3 doctors -->
                    @if ($dokters->count() > 3)
                        <button
                            class="absolute left-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-green-50 transition duration-300 z-10 hover:shadow-xl -ml-4"
                            id="carousel-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="absolute right-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-green-50 transition duration-300 z-10 hover:shadow-xl -mr-4"
                            id="carousel-next">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @endif
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-xl shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h4 class="text-lg font-medium text-gray-500 mt-4">Belum ada data dokter</h4>
                </div>
            @endif
        </div>
    </section>

    <!-- Fitur Artikel -->
    <section id="artikel" class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Informasi
                    Terkini</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Artikel <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Terbaru</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">Update informasi dan tips terbaru seputar perawatan
                    hewan kesayangan Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($artikels as $article)
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group h-full flex flex-col">
                        <!-- Article Image with Fixed Aspect Ratio -->
                        <div class="relative overflow-hidden h-48">
                            <img src="{{ $article->image ? Storage::url($article->image) : 'https://source.unsplash.com/600x400/?veterinarian,pet,animal' }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="{{ $article->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <!-- Article Content -->
                        <div class="p-6 flex-grow">
                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
                                {{ $article->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($article->excerpt ?? $article->content, 100) }}</p>
                        </div>

                        <!-- Read More Link -->
                        <div class="px-6 pb-6">
                            <a href="#"
                                class="inline-flex items-center text-green-600 font-medium group-hover:text-green-700 transition-colors">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 ml-1 transition-transform group-hover:translate-x-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 bg-white rounded-xl shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <h4 class="text-lg font-medium text-gray-500 mt-4">Belum ada artikel terbaru</h4>
                    </div>
                @endforelse
            </div>

            @if ($artikels->count() > 0)
                <div class="text-center mt-12">
                    <a href="#"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 transition-all duration-300 hover:shadow-lg">
                        Lihat Semua Artikel
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Keunggulan
                    Kami</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Fitur <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Unggulan</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">Layanan berkualitas tinggi yang membuat perawatan
                    hewan kesayangan Anda lebih mudah</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div
                    class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center mb-6 text-green-600 group-hover:text-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">Cepat
                    </h3>
                    <p class="text-gray-600">Layanan kami bekerja dengan cepat dan efisien untuk menghemat waktu Anda.
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div
                    class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center mb-6 text-blue-600 group-hover:text-blue-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">Aman
                    </h3>
                    <p class="text-gray-600">Keamanan data Anda adalah prioritas utama kami dengan sistem enkripsi
                        terbaik.</p>
                </div>

                <!-- Fitur 3 -->
                <div
                    class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-teal-100 to-teal-50 rounded-xl flex items-center justify-center mb-6 text-teal-600 group-hover:text-teal-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-teal-600 transition-colors">
                        Dukungan 24/7</h3>
                    <p class="text-gray-600">Tim support kami siap membantu Anda kapan saja, setiap hari.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    @include('layouts.footer')

    <!-- Script untuk mobile menu -->
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
    <script>
        window.addEventListener("scroll", function() {
            const beranda = document.getElementById("beranda");
            const layanan = document.getElementById("layanan");
            const dokter = document.getElementById("dokter");
            const offset = window.scrollY;

        });
    </script>

    <!-- navbar -->
    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById("navbar");

        window.addEventListener("scroll", function() {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop && currentScroll > 50) {
                // Scroll ke bawah - sembunyikan navbar
                navbar.classList.add("-translate-y-full");
            } else {
                // Scroll ke atas - tampilkan navbar
                navbar.classList.remove("-translate-y-full");
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });
    </script>



    <!-- Dokter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('carousel-track');
            const prevBtn = document.getElementById('carousel-prev');
            const nextBtn = document.getElementById('carousel-next');

            if (!track) return;

            let currentPosition = 0;
            const cardWidth = 312; // 300px width + 12px margin
            const visibleCards = Math.floor(document.querySelector('.max-w-7xl').offsetWidth / cardWidth);
            const totalCards = {{ $dokters->count() }};

            function updateCarousel() {
                track.style.transform = `translateX(-${currentPosition * cardWidth}px)`;

                // Disable prev button if at start
                if (prevBtn) prevBtn.disabled = currentPosition === 0;

                // Disable next button if at end
                if (nextBtn) nextBtn.disabled = currentPosition >= totalCards - visibleCards;
            }

            // Next button
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    if (currentPosition < totalCards - visibleCards) {
                        currentPosition++;
                        updateCarousel();
                    }
                });
            }

            // Previous button
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    if (currentPosition > 0) {
                        currentPosition--;
                        updateCarousel();
                    }
                });
            }

            // Initialize
            updateCarousel();

            // Handle window resize
            window.addEventListener('resize', function() {
                const newVisibleCards = Math.floor(document.querySelector('.max-w-7xl').offsetWidth /
                    cardWidth);
                if (newVisibleCards !== visibleCards) {
                    currentPosition = 0;
                    updateCarousel();
                }
            });
        });
    </script>

</body>

</html>

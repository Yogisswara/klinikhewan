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
    </style>

</head>

@include('layouts.navbar')

<section id="layanan" class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Pelayanan
                Unggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Layanan <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Profesional</span>
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">Kami menyediakan berbagai layanan kesehatan berkualitas
                tinggi untuk hewan kesayangan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Layanan 1 -->
            <div
                class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-blue-50 to-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-blue-500">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        Pemeriksaan Hewan</h3>
                    <p class="text-gray-600 mb-4">Pemeriksaan kesehatan menyeluruh untuk mendeteksi masalah sejak dini
                        dan memastikan kesehatan optimal hewan peliharaan Anda.</p>
                    <div class="text-blue-600 font-medium flex items-center group-hover:text-blue-700 transition">
                        Selengkapnya
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

            <!-- Layanan 2 -->
            <div
                class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-green-50 to-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-green-500">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                        </path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
                        Vaksinasi</h3>
                    <p class="text-gray-600 mb-4">Program vaksinasi lengkap untuk melindungi hewan kesayangan Anda dari
                        berbagai penyakit berbahaya dan menular.</p>
                    <div class="text-green-600 font-medium flex items-center group-hover:text-green-700 transition">
                        Selengkapnya
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

            <!-- Layanan 3 -->
            <div
                class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-pink-50 to-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-pink-500">
                        <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                        <line x1="16" y1="8" x2="2" y2="22"></line>
                        <line x1="17.5" y1="15" x2="9" y2="15"></line>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-pink-600 transition-colors">
                        Grooming</h3>
                    <p class="text-gray-600 mb-4">Perawatan profesional untuk menjaga kebersihan, kesehatan kulit dan
                        bulu, serta penampilan hewan kesayangan Anda.</p>
                    <div class="text-pink-600 font-medium flex items-center group-hover:text-pink-700 transition">
                        Selengkapnya
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

        <!-- Tombol Reservasi -->
        <div class="text-center mt-16">
            @auth
                <a href="{{ route('services.form') }}"
                    class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 transition-all duration-300 hover:shadow-lg">
                    Reservasi Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            @endauth
            @guest
                <a href="{{ route('signin') }}"
                    onclick="alert('Silakan login terlebih dahulu untuk melakukan reservasi.')"
                    class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 transition-all duration-300 hover:shadow-lg">
                    Reservasi Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            @endguest
        </div>
    </div>
</section>

@include('layouts.footer')

<!-- Lucide Icons Script -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

</html>

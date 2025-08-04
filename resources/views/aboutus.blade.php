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

<section id="about" class="py-20 bg-gradient-to-b from-white to-green-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Tentang
                Kami</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Merawat dengan <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Kasih
                    Sayang</span></h2>
            <p class="max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed">
                Komitmen kami adalah memberikan perawatan kesehatan terbaik untuk hewan peliharaan Anda dengan
                pendekatan
                yang penuh kasih sayang dan didukung oleh tim profesional berpengalaman.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Visi Misi Card -->
            <div
                class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 p-3 bg-green-100 rounded-lg text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Visi Kami</h3>
                    </div>
                    <p class="text-gray-600 pl-14">
                        Menjadi pusat layanan kesehatan hewan terdepan yang memberikan perawatan holistik dengan standar
                        internasional dan sentuhan personal yang hangat.
                    </p>

                    <div class="flex items-center mt-8 mb-6">
                        <div class="flex-shrink-0 p-3 bg-teal-100 rounded-lg text-teal-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Misi Kami</h3>
                    </div>
                    <ul class="space-y-3 pl-14">
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Memberikan diagnosa dan perawatan medis dengan teknologi
                                terkini</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Mengedukasi pemilik hewan tentang perawatan preventif</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Menciptakan lingkungan yang nyaman dan minim stres untuk
                                hewan</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sejarah Card -->
            <div
                class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 p-3 bg-blue-100 rounded-lg text-blue-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Perjalanan Kami</h3>
                    </div>
                    <div class="space-y-6">
                        <p class="text-gray-600">
                            Berdiri sejak 2010, Klinik Hewan Kami memulai perjalanan dari sebuah praktik kecil dengan
                            satu dokter hewan. Kini kami telah berkembang menjadi klinik modern dengan tim multidisiplin
                            yang melayani ribuan pasien setiap tahunnya.
                        </p>
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                            <p class="text-blue-700 font-medium">"Komitmen kami terhadap kesejahteraan hewan tidak
                                pernah berubah, meskipun fasilitas dan teknologi kami terus berkembang."</p>
                        </div>
                        <p class="text-gray-600">
                            Setiap tahun, kami berinvestasi dalam pelatihan staf dan peralatan medis terkini untuk
                            memastikan hewan peliharaan Anda mendapatkan perawatan terbaik yang tersedia.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-20">
            <a href="{{ route('services') }}"
                class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 transition-all duration-300 hover:shadow-lg">
                Lihat Layanan Kami
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

@include('layouts.footer')

</html>

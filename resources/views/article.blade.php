<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB ANOMALI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .animate-modal-in {
            animation: modal-in 0.3s ease-out forwards;
        }

        @keyframes modal-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .prose {
            line-height: 1.75;
        }

        .prose p {
            margin-bottom: 1.25em;
        }
    </style>

</head>

@include('layouts.navbar')

<section id="artikel" class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Informasi
                Terkini</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Artikel <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Terbaru</span>
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">Update informasi dan tips terbaru seputar perawatan hewan
                kesayangan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($articles as $index => $article)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-2 flex flex-col h-full">
                    <!-- Article Image -->
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://source.unsplash.com/random/800x600/?pet,veterinary,animal' }}"
                            alt="{{ $article->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>

                    <!-- Article Content -->
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ $article->doctor->user->name ?? 'Admin Klinik' }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
                            {{ $article->title }}</h3>
                        <p class="text-gray-600 mb-4 flex-grow">
                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                        </p>

                        <button onclick="openModal('modal{{ $index }}')"
                            class="mt-auto inline-flex items-center text-green-600 font-medium group-hover:text-green-700 transition">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-1 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@foreach ($articles as $index => $article)
    <div id="modal{{ $index }}"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm">
        <div
            class="bg-white w-full max-w-4xl max-h-[90vh] rounded-xl shadow-2xl overflow-hidden animate-modal-in relative flex flex-col">
            <button onclick="closeModal('modal{{ $index }}')"
                class="absolute top-4 right-4 z-10 bg-white rounded-full p-2 shadow-md text-gray-400 hover:text-red-500 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Modal Header with Image -->
            <div class="relative h-64 bg-gray-100 overflow-hidden">
                <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://source.unsplash.com/random/1600x900/?pet,veterinary,animal' }}"
                    alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>

            <!-- Modal Content -->
            <div class="p-6 sm:p-8 overflow-y-auto flex-grow">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ $article->doctor->user->name ?? 'Admin Klinik' }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}</span>
                </div>

                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">{{ $article->title }}</h2>

                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 p-4 sm:p-6 bg-gray-50">
                <button onclick="closeModal('modal{{ $index }}')"
                    class="w-full sm:w-auto bg-gradient-to-r from-green-500 to-teal-500 text-white px-6 py-3 rounded-lg font-medium hover:from-green-600 hover:to-teal-600 transition-all duration-300 shadow-md hover:shadow-lg">
                    Tutup Artikel
                </button>
            </div>
        </div>
    </div>
@endforeach

@include('layouts.footer')

<!-- Script Modal -->
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('backdrop-blur-sm')) {
            e.target.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });
</script>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB ANOMALI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>

@include('layouts.navbar')

<section id="daftar-dokter" class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1 text-sm font-semibold text-green-600 bg-green-100 rounded-full mb-4">Tim
                Profesional</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Dokter <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-teal-600">Berkualitas</span>
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">Tim dokter hewan berpengalaman yang siap memberikan
                perawatan terbaik untuk hewan kesayangan Anda</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($dokters as $dokter)
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group overflow-hidden text-center">
                    <!-- Doctor Image -->
                    <div class="h-48 bg-gradient-to-br from-blue-100 to-white flex items-center justify-center p-6">
                        <img src="{{ $dokter->image ? asset('storage/' . $dokter->image) : 'https://ui-avatars.com/api/?name=' . urlencode($dokter->name) . '&background=0D8ABC&color=fff' }}"
                            alt="{{ $dokter->name }}"
                            class="h-32 w-32 rounded-full border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                    </div>

                    <!-- Doctor Info -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $dokter->name }}</h3>
                        <p class="text-blue-600 font-medium mb-3">{{ $dokter->doctor->specialization ?? '-' }}</p>

                        @if (!empty($dokter->doctor->description))
                            <p class="text-gray-600 text-sm mb-4">{{ $dokter->doctor->description }}</p>
                        @endif

                        <button data-target="modal-{{ $dokter->id }}"
                            class="open-modal w-full bg-gradient-to-r from-blue-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                            Lihat Jadwal Praktik
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $dokter->id }}"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50 p-4">
                    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full relative animate-fadeIn overflow-hidden">
                        <button
                            class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl close-modal transition-colors">
                            &times;
                        </button>

                        <div class="bg-gradient-to-r from-blue-500 to-teal-500 p-6 text-center text-white">
                            <div
                                class="w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg mb-4">
                                <img src="{{ $dokter->image ? asset('storage/' . $dokter->image) : 'https://ui-avatars.com/api/?name=' . urlencode($dokter->name) . '&background=0D8ABC&color=fff' }}"
                                    alt="{{ $dokter->name }}" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-bold">{{ $dokter->name }}</h3>
                            <p class="text-blue-100">{{ $dokter->doctor->specialization ?? '-' }}</p>
                        </div>

                        <div class="p-6 space-y-4">
                            <h4 class="text-lg font-semibold text-gray-800 border-b pb-2">Jadwal Praktik</h4>

                            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-blue-50 transition-colors">
                                <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Senin</p>
                                    <p class="text-gray-600 text-sm">09.00 – 13.00</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-blue-50 transition-colors">
                                <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Rabu</p>
                                    <p class="text-gray-600 text-sm">13.00 – 17.00</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-blue-50 transition-colors">
                                <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Jumat</p>
                                    <p class="text-gray-600 text-sm">10.00 – 14.00</p>
                                </div>
                            </div>

                            <a href="{{ route('services.form') }}"
                                class="block mt-6 text-center bg-gradient-to-r from-green-500 to-teal-500 text-white px-6 py-3 rounded-lg font-medium hover:from-green-600 hover:to-teal-600 transition-all duration-300 shadow-md hover:shadow-lg">
                                Buat Janji
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



@include('layouts.footer')

<script>
    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            document.getElementById(target).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('[id^="modal-"]').classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('bg-black')) {
            e.target.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });
</script>

</html>

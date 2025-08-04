<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokter - Klinik Hewan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --sidebar-width: 16rem;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        .sidebar {
            width: var(--sidebar-width);
            transition: all 0.3s ease;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
        }

        .gradient-text {
            background: linear-gradient(90deg, #10b981 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .btn-primary {
            background: linear-gradient(90deg, #10b981 0%, #3b82f6 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2), 0 2px 4px -1px rgba(16, 185, 129, 0.1);
        }

        .doctor-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
        }

        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 40;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body class="min-h-screen flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <main class="main-content overflow-x-hidden overflow-y-auto bg-gray-50 p-6 lg:p-8">
        <!-- Mobile Menu Button -->
        <button id="menuToggle"
            class="md:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-md shadow-md text-green-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">
                    Kelola <span class="gradient-text">Dokter</span>
                </h1>
                <p class="text-gray-500 mt-1">Manajemen data dokter dan spesialisasi</p>
            </div>
            <div class="mt-4 md:mt-0">
                @if (auth()->user() && auth()->user()->role == 'admin')
                    <button onclick="openModal()" class="btn-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Dokter
                    </button>
                @endif
            </div>
        </div>

        <!-- Dokter List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @forelse ($dokters as $dokter)
                <div class="doctor-card card">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <img src="{{ Storage::url($dokter->image) }}" alt="Foto Dokter"
                                class="h-16 w-16 object-cover rounded-full border-2 border-white shadow">
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">{{ $dokter->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $dokter->doctor->specialization ?? 'Umum' }}</p>
                                <div class="mt-2 flex items-center gap-2">
                                    <span class="badge badge-success">Aktif</span>
                                    <span class="text-xs text-gray-400">{{ $dokter->email }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Kontak</p>
                                    <p class="font-medium">{{ $dokter->phone }}</p>
                                </div>
                                <div class="flex gap-2">
                                    @if (auth()->user() && auth()->user()->role == 'admin')
                                        <!-- Edit Button -->
                                        <button onclick='openEditModal(@json($dokter))'
                                            class="p-2 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus dokter ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition"
                                                title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3">
                    <div class="card p-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-700">Belum ada data dokter</h3>
                        <p class="mt-1 text-sm text-gray-500">Tambahkan dokter baru untuk memulai</p>
                        @if (auth()->user() && auth()->user()->role == 'admin')
                            <button onclick="openModal()" class="btn-primary mt-4 mx-auto">
                                Tambah Dokter Pertama
                            </button>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($dokters->hasPages())
            <div class="card p-4">
                {{ $dokters->links() }}
            </div>
        @endif
    </main>

    <!-- Modal Tambah Dokter -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl p-0 w-full max-w-md shadow-2xl relative flex flex-col" style="max-height:90vh;">
            <button onclick="closeModal()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="px-6 pt-6 pb-0">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Tambah Dokter Baru</h2>
            </div>
            <!-- Scrollable form area -->
            <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data"
                class="flex-1 overflow-y-auto px-6 pb-4">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                            Lengkap</label>
                        <input type="text" name="full_name" id="full_name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                            Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="specialist" class="block text-sm font-medium text-gray-700 mb-1">Spesialis</label>
                        <input type="text" name="specialist" id="specialist"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"></textarea>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi
                            Password</label>
                        <input type="password" name="confirm_password" id="confirm_password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Foto Dokter</label>
                        <input type="file" name="image" id="image"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition file:mr-4 file:py-1 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700"
                            accept="image/*">
                    </div>
                </div>
                <!-- Action buttons fixed at bottom -->
                <div class="mt-6 flex justify-end gap-3 bg-white pt-4 sticky bottom-0">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary px-4 py-2">
                        Simpan Dokter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Dokter -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-2xl relative">
            <button onclick="closeEditModal()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Edit Data Dokter</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="full_name" id="edit_full_name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="edit_email"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="text" name="phone" id="edit_phone"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="editSpecialist"
                            class="block text-sm font-medium text-gray-700 mb-1">Spesialis</label>
                        <input type="text" name="specialist" id="editSpecialist"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label for="editDescription"
                            class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="editDescription" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Dokter</label>
                        <input type="file" name="image"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition file:mr-4 file:py-1 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700"
                            accept="image/*">
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary px-4 py-2">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle sidebar for mobile
        const toggleBtn = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            document.body.classList.toggle("overflow-hidden");
        });

        // Modal functions
        function openModal() {
            document.getElementById("modal").classList.remove("hidden");
            document.body.classList.add("overflow-hidden");
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }

        function openEditModal(dokter) {
            document.getElementById("editModal").classList.remove("hidden");
            document.body.classList.add("overflow-hidden");

            // Fill form data
            document.getElementById("edit_full_name").value = dokter.name;
            document.getElementById("edit_email").value = dokter.email;
            document.getElementById("edit_phone").value = dokter.phone;
            document.getElementById("editSpecialist").value = dokter.doctor?.specialization ?? '';
            document.getElementById("editDescription").value = dokter.doctor?.description ?? '';

            // Set form action
            const form = document.getElementById("editForm");
            form.action = '/admin/dokter/' + dokter.id;
        }

        function closeEditModal() {
            document.getElementById("editModal").classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }
    </script>
</body>

</html>

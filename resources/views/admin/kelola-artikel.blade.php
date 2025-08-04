<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Artikel - Klinik Hewan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
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
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3), 0 2px 4px -1px rgba(59, 130, 246, 0.2);
        }

        .btn-edit {
            background-color: #f59e0b;
            color: white;
            transition: all 0.2s ease;
        }

        .btn-edit:hover {
            background-color: #d97706;
        }

        .btn-delete {
            background-color: #ef4444;
            color: white;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background-color: #dc2626;
        }

        .table-header {
            background-color: #f8fafc;
        }

        .table-row:hover {
            background-color: #f8fafc;
        }

        .modal-content {
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .input-field:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(90deg, #10b981 0%, #3b82f6 100%);
            border-color: transparent;
            color: white;
        }

        .pagination .page-link {
            color: #4b5563;
            border: 1px solid #e5e7eb;
        }

        .pagination .page-link:hover {
            background-color: #f3f4f6;
        }

        .empty-state {
            opacity: 0.7;
        }

        .empty-state svg {
            color: #9ca3af;
        }
    </style>
</head>

<body class="min-h-screen flex bg-gray-50">
    @include('layouts.sidebar')

    <!-- Main Content -->
    <main class="main-content overflow-x-hidden overflow-y-auto bg-gray-50 p-6 lg:p-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">
                    Kelola <span class="gradient-text">Artikel</span>
                </h1>
                <p class="text-gray-500 mt-1">Daftar artikel edukasi kesehatan hewan</p>
            </div>
            @if (Auth::user() && Auth::user()->role === 'dokter')
                <button id="addArticleBtn" class="btn-primary px-4 py-2 rounded-lg shadow-md flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Artikel
                </button>
            @endif
        </div>

        <!-- Data Artikel -->
        <div class="card p-6 mb-8">
            @if ($artikels->isEmpty())
                <div class="text-center py-12 empty-state">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Belum ada artikel</h3>
                    <p class="mt-2 text-gray-500">Mulai dengan menambahkan artikel baru untuk edukasi klien.</p>
                    @if (Auth::user() && Auth::user()->role === 'dokter')
                        <button id="addArticleBtnEmpty" class="btn-primary px-4 py-2 rounded-lg shadow-md mt-4">
                            Tambah Artikel Pertama
                        </button>
                    @endif
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" style="table-layout: fixed; width: 100%;">
                        <thead class="table-header">
                            <tr>
                                <th scope="col" style="width: 5%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" style="width: 35%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Judul Artikel
                                </th>
                                <th scope="col" style="width: 20%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Penulis
                                </th>
                                <th scope="col" style="width: 20%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Dibuat
                                </th>
                                <th scope="col" style="width: 20%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($artikels as $artikel)
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $artikel->title }}</div>
                                        <div class="text-sm text-gray-500 mt-1 truncate max-w-xs">
                                            {{ Str::limit(strip_tags($artikel->content), 60) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $artikel->doctor && $artikel->doctor->user ? $artikel->doctor->user->name : 'Tidak diketahui' }}
                                        </div>
                                        <div class="text-xs text-gray-500">Dokter</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $artikel->created_at->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $artikel->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="btn-edit px-3 py-1 rounded-md mr-2 editArticleBtn"
                                            data-id="{{ $artikel->id }}" data-title="{{ $artikel->title }}"
                                            data-content="{{ $artikel->content }}"
                                            data-update-url="{{ route('artikel.update', $artikel->id) }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete px-3 py-1 rounded-md"
                                                onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $artikels->links() }}
                </div>
            @endif
        </div>
    </main>

    <!-- Modal Tambah Artikel -->
    <div id="addArticleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="modal-content bg-white rounded-lg p-6 w-full max-w-2xl relative">
            <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                <span class="gradient-text">Tambah Artikel Baru</span>
            </h2>

            <form method="POST" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Ada {{ $errors->count() }} kesalahan
                                    dalam pengisian form:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Judul Artikel -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                    <input type="text" name="title" class="input-field w-full rounded-md p-3" required>
                </div>

                <!-- Gambar Artikel -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Artikel</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none">
                                    <span>Upload gambar</span>
                                    <input id="file-upload" name="image" type="file" class="sr-only"
                                        accept="image/*" required>
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF maksimal 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Isi Konten -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Konten</label>
                    <textarea name="content" rows="8" class="input-field w-full rounded-md p-3" required></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-3">
                    <button type="button" id="closeModalBtn2"
                        class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary px-5 py-2.5 rounded-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Simpan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Artikel -->
    <div id="editArticleModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="modal-content bg-white rounded-lg p-6 w-full max-w-2xl relative">
            <button id="closeEditModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                <span class="gradient-text">Edit Artikel</span>
            </h2>

            <form id="editArticleForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul Artikel -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                    <input type="text" name="title" id="editTitle" class="input-field w-full rounded-md p-3"
                        required>
                </div>

                <!-- Gambar Artikel -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Artikel (Biarkan kosong jika
                        tidak ingin mengubah)</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="edit-file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none">
                                    <span>Upload gambar baru</span>
                                    <input id="edit-file-upload" name="image" type="file" class="sr-only"
                                        accept="image/*">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF maksimal 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Isi Konten -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Konten</label>
                    <textarea name="content" id="editContent" rows="8" class="input-field w-full rounded-md p-3" required></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-3">
                    <button type="button" id="closeEditModalBtn2"
                        class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary px-5 py-2.5 rounded-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Update Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk modal -->
    <script>
        // Modal Tambah
        const modal = document.getElementById('addArticleModal');
        const openBtn = document.getElementById('addArticleBtn');
        const openBtnEmpty = document.getElementById('addArticleBtnEmpty');
        const closeBtn = document.getElementById('closeModalBtn');
        const closeBtn2 = document.getElementById('closeModalBtn2');

        if (openBtn) {
            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });
        }

        if (openBtnEmpty) {
            openBtnEmpty.addEventListener('click', () => {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        }

        if (closeBtn2) {
            closeBtn2.addEventListener('click', () => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        }

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });

        // Modal Edit
        const editModal = document.getElementById('editArticleModal');
        const closeEditBtn = document.getElementById('closeEditModalBtn');
        const closeEditBtn2 = document.getElementById('closeEditModalBtn2');
        const editForm = document.getElementById('editArticleForm');
        const editTitle = document.getElementById('editTitle');
        const editContent = document.getElementById('editContent');

        document.querySelectorAll('.editArticleBtn').forEach(btn => {
            btn.addEventListener('click', function() {
                editTitle.value = this.dataset.title;
                editContent.value = this.dataset.content;
                editForm.action = this.dataset.updateUrl;
                editModal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });
        });

        if (closeEditBtn) {
            closeEditBtn.addEventListener('click', () => {
                editModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        }

        if (closeEditBtn2) {
            closeEditBtn2.addEventListener('click', () => {
                editModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        }

        window.addEventListener('click', (e) => {
            if (e.target === editModal) {
                editModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>
</body>

</html>

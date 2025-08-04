<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - Klinik Hewan</title>
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

        .badge-admin {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .badge-dokter {
            background-color: #ecfccb;
            color: #65a30d;
        }

        .badge-user {
            background-color: #f3e8ff;
            color: #7e22ce;
        }

        .table-header {
            background-color: #f8fafc;
        }

        .table-row:hover {
            background-color: #f8fafc;
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

        .search-box {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .search-box:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
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
                    Kelola <span class="gradient-text">Pengguna</span>
                </h1>
                <p class="text-gray-500 mt-1">Daftar pengguna sistem klinik hewan</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari pengguna..."
                        class="search-box pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-green-500">
                </div>
            </div>
        </div>

        <!-- Data Pengguna -->
        <div class="card p-6 mb-8">
            @if ($pengguna->isEmpty())
                <div class="text-center py-12 empty-state">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Belum ada pengguna terdaftar</h3>
                    <p class="mt-2 text-gray-500">Tidak ada pengguna yang ditemukan dalam sistem.</p>
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
                                <th scope="col" style="width: 25%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Pengguna
                                </th>
                                <th scope="col" style="width: 25%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" style="width: 15%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Bergabung
                                </th>
                                <th scope="col" style="width: 15%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th>
                                {{-- <th scope="col" style="width: 15%;"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pengguna as $index => $user)
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $pengguna->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <span
                                                    class="text-gray-600 font-medium">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                                <div class="text-sm text-gray-500">
                                                    {{ '@' . strtolower(str_replace(' ', '', $user->name)) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->created_at->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $badgeClass = 'badge-user';
                                            if ($user->role === 'admin') {
                                                $badgeClass = 'badge-admin';
                                            } elseif ($user->role === 'dokter') {
                                                $badgeClass = 'badge-dokter';
                                            }
                                        @endphp
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeClass }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-green-600 hover:text-green-900 mr-4">Edit</a>
                                        <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $pengguna->onEachSide(1)->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </main>

    <script>
        // Fungsi pencarian sederhana
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.table-row');

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>

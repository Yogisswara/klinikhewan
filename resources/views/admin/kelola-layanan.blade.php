<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan - Klinik Hewan</title>
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

        .badge-confirmed {
            background-color: #f0fdf4;
            color: #10b981;
        }

        .badge-pending {
            background-color: #fef9c3;
            color: #d97706;
        }

        .badge-canceled {
            background-color: #fee2e2;
            color: #dc2626;
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
                    Kelola <span class="gradient-text">Layanan</span>
                </h1>
                <p class="text-gray-500 mt-1">Daftar reservasi layanan klinik</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="text-sm text-gray-500">Total Reservasi: {{ $reservations->total() }}</div>
            </div>
        </div>

        <!-- Data Reservasi -->
        <div class="card p-6 mb-8">
            @if ($reservations->isEmpty())
                <div class="text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Belum ada reservasi layanan</h3>
                    <p class="mt-1 text-gray-500">Tidak ada reservasi layanan yang ditemukan.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="table-header">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Pasien
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kontak
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Layanan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal & Waktu
                                </th>
                                {{-- <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th> --}}
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catatan
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($reservations as $index => $r)
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ ($reservations->currentPage() - 1) * $reservations->perPage() + $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $r->nama }}</div>
                                        <div class="text-sm text-gray-500">{{ $r->user->name ?? 'Tidak diketahui' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $r->telepon }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $r->jenis_layanan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($r->tanggal)->format('H:i') }}</div>
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusClass = 'badge-pending';
                                            $statusText = 'Menunggu';

                                            if (isset($r->status)) {
                                                if ($r->status === 'confirmed') {
                                                    $statusClass = 'badge-confirmed';
                                                    $statusText = 'Dikonfirmasi';
                                                } elseif ($r->status === 'canceled') {
                                                    $statusClass = 'badge-canceled';
                                                    $statusText = 'Dibatalkan';
                                                }
                                            }
                                        @endphp
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                            {{ $statusText }}
                                        </span>
                                    </td> --}}
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                        {{ $r->catatan ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $reservations->links() }}
                </div>
            @endif
        </div>
    </main>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const toggleBtn = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            document.body.classList.toggle("overflow-hidden");
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB ANOMALI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }

        .nav-link {
            @apply text-gray-700 font-medium hover:text-green-600 transition duration-300;
        }

        .nav-link.active {
            @apply text-green-600 font-semibold;
        }

        .form-section {
            background: linear-gradient(135deg, #f0fff4 0%, #e6fffa 100%);
        }

        .form-container {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(to right, #38a169, #48bb78);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .form-header h2 {
            font-weight: 700;
            font-size: 1.75rem;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .form-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #2d3748;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }

        .form-input:focus {
            border-color: #48bb78;
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.2);
            outline: none;
            background-color: white;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(to right, #38a169, #48bb78);
            color: white;
            border: none;
            padding: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: linear-gradient(to right, #2f855a, #38a169);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .success-message {
            background-color: #f0fff4;
            border-left: 4px solid #48bb78;
            color: #2f855a;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .success-icon {
            color: #48bb78;
            font-size: 1.25rem;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 2.6rem;
            color: #718096;
        }

        @media (max-width: 640px) {
            .form-container {
                margin: 0 1rem;
            }

            .form-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>

@include('layouts.navbar')

<section class="py-16 form-section min-h-screen flex items-center">
    <div class="max-w-xl mx-auto w-full form-container">
        <div class="form-header">
            <h2>Formulir Reservasi</h2>
        </div>

        <div class="form-body bg-white">
            @if (session('success'))
                <div class="success-message">
                    <i class="success-icon" data-lucide="check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('reservasi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-input"
                        placeholder="Masukkan nama lengkap" required>
                    <i class="input-icon" data-lucide="user"></i>
                </div>

                <div class="form-group">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-input"
                        placeholder="Masukkan nomor telepon" required>
                    <i class="input-icon" data-lucide="phone"></i>
                </div>

                <div class="form-group">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <select name="jenis_layanan" id="jenis_layanan" class="form-input form-select" required>
                        <option value="" disabled selected>-- Pilih Layanan --</option>
                        <option value="Pemeriksaan Hewan">Pemeriksaan Hewan</option>
                        <option value="Vaksinasi">Vaksinasi</option>
                        <option value="Grooming">Grooming</option>
                    </select>
                    <i class="input-icon" data-lucide="clipboard-list"></i>
                </div>

                <div class="form-group">
                    <label for="tanggal" class="form-label">Tanggal Reservasi</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-input" required>
                    <i class="input-icon" data-lucide="calendar"></i>
                </div>

                <div class="form-group">
                    <label for="catatan" class="form-label">Catatan (Riwayat/Keluhan)</label>
                    <textarea name="catatan" id="catatan" rows="4" class="form-input form-textarea"
                        placeholder="Masukkan catatan tambahan jika ada"></textarea>
                    <i class="input-icon" data-lucide="message-square"></i>
                </div>

                <button type="submit" class="submit-btn w-full mt-2">
                    <i data-lucide="send"></i>
                    Kirim Reservasi
                </button>
            </form>
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

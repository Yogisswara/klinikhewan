<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Klinik Hewan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        }

        .signup-card {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }

        .gradient-text {
            background: linear-gradient(90deg, #10b981 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .input-field {
            transition: all 0.3s ease;
            background-color: rgba(241, 245, 249, 0.6);
        }

        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        .signup-btn {
            background: linear-gradient(90deg, #10b981 0%, #3b82f6 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2), 0 2px 4px -1px rgba(16, 185, 129, 0.06);
        }

        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2), 0 4px 6px -2px rgba(16, 185, 129, 0.05);
        }

        .hero-image {
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
                url('https://images.unsplash.com/photo-1594149929911-78975a43d4f5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }

        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl rounded-2xl overflow-hidden shadow-2xl flex flex-col md:flex-row signup-card">
        <!-- Hero Image Section -->
        <div class="md:w-1/2 hero-image flex items-center justify-center p-10 text-white hidden md:flex">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Bergabunglah Dengan Kami</h1>
                <p class="text-xl opacity-90">Daftar sekarang untuk mendapatkan akses penuh ke semua layanan klinik kami
                    dan berikan perawatan terbaik untuk hewan kesayangan Anda.</p>
                <div class="mt-8 flex justify-center">
                    <div class="w-16 h-1 bg-white rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Signup Form Section -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Buat Akun <span
                        class="gradient-text">KlinikHewan</span></h2>
                <p class="text-gray-600">Isi formulir berikut untuk mendaftar</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan</h3>
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

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" id="full_name" name="full_name" required placeholder="Nama lengkap Anda"
                            class="pl-10 input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-0" />
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required placeholder="email@contoh.com"
                            class="pl-10 input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-0" />
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <input type="tel" id="phone" name="phone" required placeholder="0812-3456-7890"
                            class="pl-10 input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-0" />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="pl-10 input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-0" />
                    </div>
                    <div class="mt-2 flex space-x-1">
                        <div class="password-strength w-1/4 bg-gray-200 rounded-full"></div>
                        <div class="password-strength w-1/4 bg-gray-200 rounded-full"></div>
                        <div class="password-strength w-1/4 bg-gray-200 rounded-full"></div>
                        <div class="password-strength w-1/4 bg-gray-200 rounded-full"></div>
                    </div>
                </div>

                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata
                        Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="••••••••"
                            class="pl-10 input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-0" />
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox"
                        class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        Saya setuju dengan <a href="#" class="text-green-600 hover:underline">Syarat &
                            Ketentuan</a>
                    </label>
                </div>

                <div>
                    <button type="submit"
                        class="w-full signup-btn text-white font-medium py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Sudah punya akun?</span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('signin') }}"
                        class="w-full flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Masuk ke Akun Anda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthBars = document.querySelectorAll('.password-strength');

        passwordInput.addEventListener('input', function() {
            const strength = calculatePasswordStrength(this.value);
            updateStrengthIndicator(strength);
        });

        function calculatePasswordStrength(password) {
            let strength = 0;

            // Length check
            if (password.length > 0) strength += 1;
            if (password.length >= 8) strength += 1;

            // Complexity checks
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;

            return Math.min(strength, 4);
        }

        function updateStrengthIndicator(strength) {
            strengthBars.forEach((bar, index) => {
                if (index < strength) {
                    let color;
                    if (strength <= 2) color = 'bg-red-500';
                    else if (strength === 3) color = 'bg-yellow-500';
                    else color = 'bg-green-500';

                    bar.classList.remove('bg-gray-200', 'bg-red-500', 'bg-yellow-500', 'bg-green-500');
                    bar.classList.add(color);
                } else {
                    bar.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500');
                    bar.classList.add('bg-gray-200');
                }
            });
        }
    </script>
</body>

</html>

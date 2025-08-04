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

        .profile-section {
            background: linear-gradient(to bottom, #f0fff4 0%, #ffffff 100%);
        }

        .profile-card {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
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

        .profile-header {
            background: linear-gradient(to right, #38a169, #48bb78);
            padding: 2rem;
            text-align: center;
            color: white;
            position: relative;
        }

        .avatar-container {
            position: relative;
            display: inline-block;
            margin-top: -70px;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            background-color: #e2e8f0;
        }

        .edit-avatar {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            color: #48bb78;
        }

        .profile-body {
            padding: 2rem;
        }

        .info-group {
            margin-bottom: 1.5rem;
        }

        .info-label {
            font-size: 0.875rem;
            color: #718096;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 500;
            color: #2d3748;
            padding: 0.5rem 0;
            border-bottom: 1px solid #edf2f7;
        }

        .edit-button {
            background: linear-gradient(to right, #38a169, #48bb78);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .edit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            .profile-header {
                padding: 1.5rem;
            }

            .avatar {
                width: 100px;
                height: 100px;
            }

            .profile-body {
                padding: 1.5rem;
            }
        }
    </style>

</head>

@include('layouts.navbar')

<section class="profile-section py-16 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto profile-card bg-white">
            <!-- Header Profil -->
            <div class="profile-header">
                <h1 class="text-2xl font-bold">Profil Pengguna</h1>
            </div>

            <!-- Avatar dan Info Dasar -->
            <div class="text-center">
                <div class="avatar-container">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Foto Profil" class="avatar">
                    @else
                        <div class="avatar flex items-center justify-center text-4xl text-gray-500">
                            <i data-lucide="user"></i>
                        </div>
                    @endif
                    <div class="edit-avatar" onclick="document.getElementById('avatar-upload').click()">
                        <i data-lucide="camera" class="w-4 h-4"></i>
                        <input type="file" id="avatar-upload" class="hidden" accept="image/*">
                    </div>
                </div>

                <h2 class="text-xl font-bold mt-4">{{ $user->name }}</h2>
                <p class="text-green-600">{{ $user->role }}</p>
            </div>

            <!-- Body Profil -->
            <div class="profile-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="info-group">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">{{ $user->name }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $user->email }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Nomor Telepon</div>
                        <div class="info-value">{{ $user->phone ?? 'Belum diisi' }}</div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Tanggal Bergabung</div>
                        <div class="info-value">{{ $user->created_at->format('d F Y') }}</div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button class="edit-button open-modal" data-target="modal-edit-profile">
                        <i data-lucide="edit" class="w-4 h-4 inline mr-2"></i>
                        Edit Profil
                    </button>
                </div>
                <!-- Modal Edit Profil -->
                <div id="modal-edit-profile"
                    class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative animate-fadeIn">
                        <button class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 close-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="text-xl font-bold mb-4">Edit Profil</h2>
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" class="w-full border rounded px-3 py-2"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" class="w-full border rounded px-3 py-2"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Nomor Telepon</label>
                                <input type="text" name="phone" class="w-full border rounded px-3 py-2"
                                    value="{{ $user->phone }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Foto Profil</label>
                                <input type="file" name="image" accept="image/*" class="w-full">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="edit-button">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

    // Avatar upload preview
    document.getElementById('avatar-upload').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();

            reader.onload = function(event) {
                const avatar = document.querySelector('.avatar');
                if (avatar.tagName === 'IMG') {
                    avatar.src = event.target.result;
                } else {
                    // Replace div with img if it's the first upload
                    const newAvatar = document.createElement('img');
                    newAvatar.src = event.target.result;
                    newAvatar.className = 'avatar';
                    newAvatar.alt = 'Foto Profil';
                    document.querySelector('.avatar-container').replaceChild(newAvatar, avatar);
                }
            }

            reader.readAsDataURL(e.target.files[0]);

            // Here you would typically upload the file to the server
            console.log('Avatar uploaded:', e.target.files[0].name);
        }
    });
</script>
<!-- Lucide Icons Script -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

</html>

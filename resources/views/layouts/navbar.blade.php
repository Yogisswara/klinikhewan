<nav id="navbar"
    class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-lg shadow-sm transition-all duration-500 ease-in-out border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span
                        class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-500 to-teal-600 tracking-wide">KlinikHewan</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="relative group px-1 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300 {{ request()->routeIs('home') ? 'text-green-600' : '' }}">
                    Beranda
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('services') }}"
                    class="relative group px-1 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300 {{ request()->routeIs('layanan') ? 'text-green-600' : '' }}">
                    Layanan
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('layanan') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('doctor') }}"
                    class="relative group px-1 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300 {{ request()->routeIs('dokter') ? 'text-green-600' : '' }}">
                    Dokter
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('dokter') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('article') }}"
                    class="relative group px-1 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300 {{ request()->routeIs('artikel') ? 'text-green-600' : '' }}">
                    Artikel
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('artikel') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('aboutus') }}"
                    class="relative group px-1 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300 {{ request()->routeIs('tentang') ? 'text-green-600' : '' }}">
                    Tentang Kami
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('tentang') ? 'scale-x-100' : '' }}"></span>
                </a>
            </div>

            <!-- Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <!-- User Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            @if (auth()->user()->image)
                                <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                    class="w-8 h-8 rounded-full object-cover border-2 border-green-200 hover:border-green-400 transition-all duration-300">
                            @else
                                <div
                                    class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 border-2 border-green-200 hover:border-green-400 transition-all duration-300">
                                    <i data-lucide="user" class="w-5 h-5"></i>
                                </div>
                            @endif
                            <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                            <i data-lucide="chevron-down"
                                class="w-4 h-4 text-gray-500 transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 translate-y-1 z-50">
                            <div class="px-4 py-3">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-green-600">{{ auth()->user()->role }}</p>
                            </div>

                            <div class="py-1">
                                <a href="{{ route('profile') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200">
                                    <i data-lucide="settings" class="w-4 h-4 mr-2"></i>
                                    Pengaturan Profil
                                </a>
                            </div>

                            <div class="py-1">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200">
                                        <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('signin') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('signup') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-teal-600 rounded-lg hover:from-green-600 hover:to-teal-700 transition-all duration-300 shadow-md hover:shadow-lg">
                        Daftar
                    </a>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button
                    class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-green-600 focus:outline-none transition-colors duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden bg-white shadow-lg transition-all duration-300 ease-in-out">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-colors duration-300 {{ request()->routeIs('home') ? 'bg-green-50 text-green-600' : '' }}">
                Beranda
            </a>
            <a href="{{ route('services') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-colors duration-300 {{ request()->routeIs('layanan') ? 'bg-green-50 text-green-600' : '' }}">
                Layanan
            </a>
            <a href="{{ route('doctor') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-colors duration-300 {{ request()->routeIs('dokter') ? 'bg-green-50 text-green-600' : '' }}">
                Dokter
            </a>
            <a href="{{ route('article') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-colors duration-300 {{ request()->routeIs('artikel') ? 'bg-green-50 text-green-600' : '' }}">
                Artikel
            </a>
            <a href="{{ route('aboutus') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-colors duration-300 {{ request()->routeIs('tentang') ? 'bg-green-50 text-green-600' : '' }}">
                Tentang Kami
            </a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200 px-5">
            @auth
                <div class="mb-2 text-sm text-gray-700">
                    {{ auth()->user()->name }}
                    <span class="text-xs text-gray-500">({{ auth()->user()->role }})</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit"
                        class="w-full flex justify-center px-4 py-2 text-sm font-medium text-red-600 hover:text-white hover:bg-red-600 rounded-lg transition-all duration-300 border border-red-600 hover:border-red-700">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <div class="space-y-3">
                    <a href="{{ route('signin') }}"
                        class="w-full block text-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('signup') }}"
                        class="w-full block text-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-teal-600 rounded-lg hover:from-green-600 hover:to-teal-700 transition-all duration-300 shadow-md hover:shadow-lg">
                        Daftar
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>

<script>
    // Mobile menu script
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        menu.classList.toggle("block");
    });

    // Navbar scroll effect
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function() {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop && currentScroll > 50) {
            navbar.classList.add("-translate-y-full");
            navbar.classList.remove("shadow-sm");
        } else {
            navbar.classList.remove("-translate-y-full");
            if (currentScroll > 10) {
                navbar.classList.add("shadow-md");
            } else {
                navbar.classList.remove("shadow-md");
            }
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
</script>

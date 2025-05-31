<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | B&B</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('styles')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            200: '#fbcfe8',
                            300: '#f9a8d4',
                            400: '#f472b6',
                            500: '#ec4899',
                            600: '#db2777',
                            700: '#be185d',
                            800: '#9d174d',
                            900: '#831843',
                        },
                        dark: {
                            900: '#1f1f1f',
                            800: '#2a2a2a',
                            700: '#3d3d3d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glass-nav {
            background: rgba(31, 31, 31, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1f1f1f 0%, #831843 100%);
        }
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .input-field:focus {
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 2px rgba(236, 72, 153, 0.5);
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        .sidebar-item.active {
            background: rgba(236, 72, 153, 0.1);
            border-left: 3px solid #ec4899;
        }
        .animate-float {
            animation: float 8s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white flex flex-col">
    <!-- Web3 Animated Background Elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 left-10 w-32 h-32 rounded-full bg-primary-500/10 blur-xl animate-float"></div>
        <div class="absolute top-1/3 right-20 w-40 h-40 rounded-full bg-primary-600/10 blur-xl animate-float animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/3 w-28 h-28 rounded-full bg-primary-400/10 blur-xl animate-float animation-delay-4000"></div>
    </div>

    <!-- Navigation -->
    <nav class="glass-nav py-4 px-6 flex items-center justify-between sticky top-0 z-50">
        <div class="flex items-center space-x-4">
            <button id="sidebarToggle" class="text-primary-300 hover:text-white lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <a href="" class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-primary-700/20 flex items-center justify-center border border-primary-500/30 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-primary-400 to-white bg-clip-text text-transparent">Bloom🌼& Blush🌺</span>
            </a>
        </div>

        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-4">
                <button class="text-primary-300 hover:text-white relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-primary-500/20 flex items-center justify-center border border-primary-500/30">
                            <span class="text-sm font-medium text-primary-300"> {{ substr(Auth::user()->username, 0, 2) }}</span>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 glass-card rounded-lg shadow-lg py-1 z-50"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95">
                        <a href="#" class="block px-4 py-2 text-sm text-primary-200 hover:bg-primary-500/10">Profil</a>
                        <a href="#" class="block px-4 py-2 text-sm text-primary-200 hover:bg-primary-500/10">Pengaturan</a>
                        <div class="border-t border-white/10 my-1"></div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-primary-200 hover:bg-primary-500/10">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="hidden lg:block w-64 glass-card border-r border-white/10 overflow-y-auto transition-all duration-300 transform -translate-x-full lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-40">
            <div class="p-4">
                <div class="text-xs uppercase text-primary-400 font-semibold mb-2 px-4">Menu Utama</div>
                <nav class="space-y-1">
                    <a href="/" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-2 2v7a2 2 0 01-2 2H9a2 2 0 01-2-2v-7" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('pembelis.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('pembelis.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M15 11a4 4 0 11-6 0 4 4 0 016 0z" />
                        </svg>
                        Pembeli
                    </a>

                    <a href="{{ route('pembelians.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('pembelians.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293a1 1 0 00.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                        Pembelian
                    </a>

                    <a href="{{ route('barangs.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('barangs.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7m16 0l-8-5-8 5" />
                        </svg>
                        Barang
                    </a>

                    <a href="{{ route('supliers.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('supliers.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13v6M9 17a3 3 0 11-6 0 3 3 0 016 0zM9 11V7a2 2 0 00-2-2H4a2 2 0 00-2 2v4" />
                        </svg>
                        Supplier
                    </a>

                    <a href="{{ route('penjualans.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('penjualans.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-2M7 13h6" />
                        </svg>
                        Penjualan
                    </a>

                    <a href="{{ route('kategoris.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('kategoris.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10l5 5-10 10-5-5 10-10z" />
                        </svg>
                        Kategori
                    </a>

                    <a href="{{ route('detail-penjualans.index') }}" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('detail-penjualans.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l5 5v9a2 2 0 01-2 2z" />
                        </svg>
                        Detail Penjualan
                    </a>
                </nav>

                <div class="text-xs uppercase text-primary-400 font-semibold mt-6 mb-2 px-4">Laporan</div>
                <nav class="space-y-1">
                    <a href="" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Laporan Penjualan
                    </a>
                    <a href="" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Laporan Stok
                    </a>
                </nav>

                <div class="text-xs uppercase text-primary-400 font-semibold mt-6 mb-2 px-4">Pengaturan</div>
                <nav class="space-y-1">
                    <a href="" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Pengguna
                    </a>
                    <a href="" class="sidebar-item flex items-center px-4 py-3 text-sm font-medium rounded-r-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan Sistem
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-y-auto p-6">
            <!-- Page Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-primary-400 to-white bg-clip-text text-transparent">@yield('title')</h2>
                    <p class="text-primary-300">@yield('subtitle', 'Manajemen B&B')</p>
                </div>
                <div class="mt-4 md:mt-0">
                    @yield('actions')
                </div>
            </div>

            <!-- Content -->
            <div class="glass-card rounded-xl p-6">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 z-50 hidden">
        <div class="glass-card rounded-lg p-4 shadow-lg flex items-start border-l-4 border-primary-500 max-w-xs">
            <div class="flex-shrink-0">
                <svg id="toast-icon" class="h-6 w-6 text-primary-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <p id="toast-title" class="text-sm font-medium text-white">Success</p>
                <p id="toast-message" class="mt-1 text-sm text-primary-200">Operasi berhasil dilakukan</p>
            </div>
            <button onclick="hideToast()" class="ml-4 flex-shrink-0 text-primary-300 hover:text-white">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });

        function showToast(type, message) {
            const toast = document.getElementById('toast');
            const toastIcon = document.getElementById('toast-icon');
            const toastTitle = document.getElementById('toast-title');

            if (type === 'success') {
                toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />';
                toastIcon.classList.remove('text-red-500', 'text-yellow-500');
                toastIcon.classList.add('text-primary-400');
                toastTitle.textContent = 'Success';
                toastTitle.classList.remove('text-red-400', 'text-yellow-400');
                toastTitle.classList.add('text-white');
            } else if (type === 'error') {
                toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />';
                toastIcon.classList.remove('text-primary-400', 'text-yellow-500');
                toastIcon.classList.add('text-red-500');
                toastTitle.textContent = 'Error';
                toastTitle.classList.remove('text-white', 'text-yellow-400');
                toastTitle.classList.add('text-red-400');
            } else if (type === 'warning') {
                toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />';
                toastIcon.classList.remove('text-primary-400', 'text-red-500');
                toastIcon.classList.add('text-yellow-500');
                toastTitle.textContent = 'Warning';
                toastTitle.classList.remove('text-white', 'text-red-400');
                toastTitle.classList.add('text-yellow-400');
            }

            document.getElementById('toast-message').textContent = message;
            toast.classList.remove('hidden');

            setTimeout(hideToast, 5000);
        }

        function hideToast() {
            document.getElementById('toast').classList.add('hidden');
        }

        @if(session('success'))
            showToast('success', '{{ session('success') }}');
        @endif
        @if(session('error'))
            showToast('error', '{{ session('error') }}');
        @endif
        @if(session('warning'))
            showToast('warning', '{{ session('warning') }}');
        @endif
    </script>
    @stack('scripts')
</body>
</html>

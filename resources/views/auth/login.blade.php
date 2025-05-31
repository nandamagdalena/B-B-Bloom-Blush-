<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | B&B (Bloom And Blush)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                            900: '#0f172a',
                            800: '#1e293b',
                            700: '#334155',
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
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #831843 100%);
        }
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .input-field:focus {
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 2px rgba(236, 72, 153, 0.5);
        }
    </style>
</head>
<body class="gradient-bg min-h-full flex items-center justify-center p-4 font-sans text-white">

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

    <div class="glass-card rounded-2xl overflow-hidden w-full max-w-md">
        <!-- Animated Background Element -->
        <div class="relative h-2 bg-gradient-to-r from-primary-500 to-primary-700">
            <div class="absolute inset-0 bg-gradient-to-r from-primary-400 to-primary-600 animate-pulse"></div>
        </div>

        <div class="p-8">
            <!-- Logo & Title -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-700/20 mb-4 border border-primary-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-primary-400 to-white bg-clip-text text-transparent">Toko Bunga B&B</h1>
                <p class="mt-2 text-primary-200">Bloom And Blush</p>
            </div>

            <!-- Login Form -->
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-primary-100 mb-2">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-primary-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="username" name="username" type="text" required
                               class="input-field w-full pl-10 pr-3 py-3 rounded-lg border border-white/10 focus:outline-none focus:ring-0"
                               placeholder="masukkan username">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-primary-100 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-primary-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 8V6a5 5 0 0110 0v2h1a1 1 0 011 1v9a1 1 0 01-1 1H4a1 1 0 01-1-1V9a1 1 0 011-1h1zm2-2a3 3 0 016 0v2H7V6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" required
                               class="input-field w-full pl-10 pr-3 py-3 rounded-lg border border-white/10 focus:outline-none focus:ring-0"
                               placeholder="masukkan password">
                    </div>
                </div>

                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-white/10 rounded bg-white/10">
                        <label for="remember-me" class="ml-2 block text-sm text-primary-200">Ingat saya</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-primary-400 hover:text-primary-300">Lupa password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center items-center py-3 px-4 rounded-lg bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-medium shadow-lg hover:shadow-primary-500/20 transition-all duration-300">
                        <span>Masuk</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-primary-300">
                    Belum punya akun?
                    <a href="/register" class="font-medium text-primary-400 hover:text-primary-300 transition-colors">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Web3 Animated Elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 left-10 w-32 h-32 rounded-full bg-primary-500/10 blur-xl animate-float"></div>
        <div class="absolute top-1/3 right-20 w-40 h-40 rounded-full bg-primary-600/10 blur-xl animate-float animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/3 w-28 h-28 rounded-full bg-primary-400/10 blur-xl animate-float animation-delay-4000"></div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        .animate-float {
            animation: float 8s ease-in-out infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script>
        // Pastikan DOM sudah fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                showToast('success', '{{ session('success') }}');
            @endif
            @if(session('error'))
                showToast('error', '{{ session('error') }}');
            @endif
            @if(session('warning'))
                showToast('warning', '{{ session('warning') }}');
            @endif
        });

        // Fungsi toast yang lebih robust
        function showToast(type, message) {
            const toast = document.getElementById('toast');
            if (!toast) return;

            const toastIcon = document.getElementById('toast-icon');
            const toastTitle = document.getElementById('toast-title');
            const toastMessage = document.getElementById('toast-message');

            // Reset classes
            toastIcon.className = 'h-6 w-6';
            toastTitle.className = 'text-sm font-medium';

            // Set type
            switch(type) {
                case 'success':
                    toastIcon.classList.add('text-primary-400');
                    toastTitle.classList.add('text-white');
                    toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />';
                    toastTitle.textContent = 'Success';
                    break;
                case 'error':
                    toastIcon.classList.add('text-red-500');
                    toastTitle.classList.add('text-red-400');
                    toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />';
                    toastTitle.textContent = 'Error';
                    break;
                case 'warning':
                    toastIcon.classList.add('text-yellow-500');
                    toastTitle.classList.add('text-yellow-400');
                    toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />';
                    toastTitle.textContent = 'Warning';
                    break;
            }

            toastMessage.textContent = message;
            toast.classList.remove('hidden');

            setTimeout(() => {
                toast.classList.add('hidden');
            }, 5000);
        }

        function hideToast() {
            const toast = document.getElementById('toast');
            if (toast) toast.classList.add('hidden');
        }
    </script>
    @stack('scripts')
</body>
</html>

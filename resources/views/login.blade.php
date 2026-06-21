<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Masuk - KosKita</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#006c49",
                        "primary-container": "#10b981",
                        "on-primary": "#ffffff",
                        "on-surface": "#191c1e",
                        "on-surface-variant": "#3c4a42",
                        "secondary": "#505f76",
                        "surface": "#f7f9fb",
                        "surface-container": "#eceef0",
                        "surface-container-low": "#f2f4f6",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#6c7a71",
                        "outline-variant": "#bbcabf",
                        "on-primary-fixed-variant": "#005236",
                        "error": "#ba1a1a",
                    },
                    spacing: {
                        "xs": "4px", "sm": "8px", "md": "16px", "lg": "24px",
                        "xl": "32px", "xxl": "48px",
                        "margin-mobile": "16px", "margin-desktop": "64px",
                        "max-width": "1280px",
                    },
                    fontSize: {
                        "label-sm": ["12px", { lineHeight: "16px", fontWeight: "600" }],
                        "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.05em", fontWeight: "500" }],
                        "body-sm": ["14px", { lineHeight: "20px", fontWeight: "400" }],
                        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                        "headline-sm": ["20px", { lineHeight: "28px", fontWeight: "600" }],
                        "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                        "headline-lg": ["30px", { lineHeight: "38px", letterSpacing: "-0.01em", fontWeight: "600" }],
                        "headline-xl": ["36px", { lineHeight: "44px", letterSpacing: "-0.02em", fontWeight: "700" }],
                    },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<!-- TopNavBar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-surface border-b border-outline-variant h-20">
    <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop w-full max-w-max-width mx-auto h-full">
        <a href="{{ url('/') }}" class="font-headline-md text-headline-md font-bold text-primary no-underline">KosKita</a>
        <div class="hidden md:flex items-center gap-lg">
            <a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors" href="{{ url('/') }}">Cari Kamar</a>
            <a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors" href="#">Untuk Pemilik</a>
            <a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors" href="#">Tentang Kami</a>
        </div>
    </div>
</nav>

<!-- Main Content: Split Screen Login -->
<main class="flex-grow pt-20 flex min-h-screen">
    <!-- Left Side: Hero Image -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden" style="min-height: calc(100vh - 80px);">
        <img alt="Interior kamar kos nyaman" class="absolute inset-0 w-full h-full object-cover"
             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDluTYtCweorbp8qGGl-8S-SIs7BJ2LmJGX2SK8SVMUGxTdBFnV0OIsVxdrC4S7ustkWVeufqwto2BqcKBV5rcfQVT7NBMxPivoMzC4mEd4zP1Ye06D6zn3tLfqoNW3lk6OwmBXQjG6yTHL55_TXVKGP6drgaNxcuWlXh6pxwwrlcNcEUnm6ZKNzJOvThfZx-_ImUy4vosxrG5OFh6FlubdKXCa9oFtFZMkQtvDq5dbbDCmGd1wP8bLEhGkHlazXTKRMPi0Zw0HNbIn">
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-end p-xxl">
            <div class="max-w-md" id="hero-text">
                <h2 class="font-headline-xl text-white mb-sm">Temukan Ruang Nyaman Anda</h2>
                <p class="font-body-lg text-white/90">Ribuan pilihan kos berkualitas untuk mahasiswa dan pekerja di seluruh Indonesia.</p>
            </div>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-margin-mobile md:p-margin-desktop bg-surface">
        <div class="w-full max-w-[440px]">
            <header class="mb-xxl">
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-sm">Selamat Datang Kembali</h1>
                <p class="font-body-md text-secondary">Silakan masuk ke akun KosKita Anda untuk melanjutkan.</p>
            </header>

            {{-- Success Message (e.g. after registration) --}}
            @if (session('success'))
                <div class="mb-lg bg-green-50 border border-green-200 rounded-lg p-md">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="mb-lg bg-red-50 border border-red-200 rounded-lg p-md">
                    <ul class="text-sm text-red-600 list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-lg" method="POST" action="{{ url('/login') }}">
                @csrf
                <!-- Email Field -->
                <div class="space-y-xs">
                    <label class="font-label-md text-on-surface-variant" for="email">Email</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">mail</span>
                        <input class="w-full pl-[48px] pr-md py-md bg-white border border-outline-variant rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all font-body-md text-on-surface"
                               id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" type="email" required>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-xs">
                    <label class="font-label-md text-on-surface-variant" for="password">Kata Sandi</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">lock</span>
                        <input class="w-full pl-[48px] pr-md py-md bg-white border border-outline-variant rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all font-body-md text-on-surface"
                               id="password" name="password" placeholder="••••••••" type="password" required>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-sm cursor-pointer group">
                        <input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="remember">
                        <span class="font-body-sm text-secondary group-hover:text-on-surface transition-colors">Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button class="w-full py-lg bg-primary-container hover:bg-primary text-white font-bold rounded-lg shadow-sm hover:shadow-md transition-all duration-300 transform active:scale-[0.98]" type="submit">
                    Masuk Sekarang
                </button>

                <!-- Footer Link -->
                <div class="pt-xl text-center">
                    <p class="font-body-sm text-secondary">
                        Belum punya akun?
                        <a class="text-primary font-bold hover:underline transition-all" href="{{ url('/register') }}">Daftar sekarang</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-surface-container-low border-t border-outline-variant">
    <div class="flex flex-col md:flex-row justify-between items-center px-margin-mobile md:px-margin-desktop py-lg w-full max-w-max-width mx-auto">
        <div class="mb-md md:mb-0">
            <span class="font-headline-sm text-headline-sm font-bold text-primary">KosKita</span>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-sm md:mt-0">2026 kosKita Management. All rights reserved.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-lg">
            <a class="font-body-sm text-on-surface-variant hover:text-primary underline transition-all" href="#">Syarat & Ketentuan</a>
            <a class="font-body-sm text-on-surface-variant hover:text-primary underline transition-all" href="#">Kebijakan Privasi</a>
            <a class="font-body-sm text-on-surface-variant hover:text-primary underline transition-all" href="#">Hubungi Kami</a>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const heroText = document.getElementById('hero-text');
        if (heroText) {
            heroText.style.opacity = '0';
            heroText.style.transform = 'translateY(20px)';
            setTimeout(() => {
                heroText.style.transition = 'all 1s ease-out';
                heroText.style.opacity = '1';
                heroText.style.transform = 'translateY(0)';
            }, 300);
        }
    });
</script>
</body>
</html>

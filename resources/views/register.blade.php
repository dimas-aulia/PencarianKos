<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar - KosKita</title>
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
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block; vertical-align: middle;
        }
        .custom-radio:checked + label { border-color: #006c49; background-color: #f0fdf4; }
        .custom-radio:checked + label .radio-circle { background-color: #006c49; border-color: #006c49; }
        .custom-radio:checked + label .radio-inner { opacity: 1; }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">

<!-- TopNavBar -->
<nav class="bg-surface border-b border-outline-variant fixed top-0 left-0 right-0 z-50 h-20 flex items-center">
    <div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop max-w-max-width mx-auto">
        <a href="{{ url('/') }}" class="font-headline-md text-headline-md font-bold text-primary no-underline">KosKita</a>
        <div class="hidden md:flex items-center space-x-xl font-body-md text-body-md">
            <a class="text-secondary hover:text-primary transition-colors" href="{{ url('/') }}">Cari Kamar</a>
            <a class="text-secondary hover:text-primary transition-colors" href="#">Untuk Pemilik</a>
            <a class="text-secondary hover:text-primary transition-colors" href="#">Tentang Kami</a>
            <a href="{{ url('/login') }}" class="bg-primary text-on-primary px-lg py-sm rounded-lg font-label-md transition-opacity active:opacity-80 no-underline">Masuk</a>
        </div>
    </div>
</nav>

<main class="min-h-screen pt-20 flex flex-col md:flex-row">
    <!-- Left Section: Visual -->
    <section class="hidden md:block md:w-1/2 relative min-h-[calc(100vh-80px)] overflow-hidden">
        <img alt="Interior kamar kos premium" class="absolute inset-0 w-full h-full object-cover"
             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDluTYtCweorbp8qGGl-8S-SIs7BJ2LmJGX2SK8SVMUGxTdBFnV0OIsVxdrC4S7ustkWVeufqwto2BqcKBV5rcfQVT7NBMxPivoMzC4mEd4zP1Ye06D6zn3tLfqoNW3lk6OwmBXQjG6yTHL55_TXVKGP6drgaNxcuWlXh6pxwwrlcNcEUnm6ZKNzJOvThfZx-_ImUy4vosxrG5OFh6FlubdKXCa9oFtFZMkQtvDq5dbbDCmGd1wP8bLEhGkHlazXTKRMPi0Zw0HNbIn">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-xl">
            <div class="text-white max-w-lg">
                <h2 class="font-headline-xl text-headline-xl mb-md">Temukan kenyamanan seperti di rumah sendiri.</h2>
                <p class="font-body-lg text-body-lg opacity-90">Ribuan pilihan kos berkualitas untuk mahasiswa dan profesional muda di seluruh Indonesia.</p>
            </div>
        </div>
    </section>

    <!-- Right Section: Registration Form -->
    <section class="w-full md:w-1/2 bg-surface-container-lowest flex flex-col items-center justify-center px-margin-mobile md:px-xxl py-xxl">
        <div class="w-full max-w-md">
            <div class="mb-xl">
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-sm">Buat Akun Baru</h1>
                <p class="font-body-md text-secondary">Bergabunglah dengan komunitas KosKita hari ini.</p>
            </div>

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

            <form class="space-y-lg" method="POST" action="{{ url('/register') }}">
                @csrf
                <!-- Role Selection -->
                <div class="space-y-sm">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Daftar sebagai</label>
                    <div class="grid grid-cols-2 gap-md">
                        <div>
                            <input {{ old('role', 'pencari') === 'pencari' ? 'checked' : '' }} class="hidden custom-radio" id="pencari" name="role" type="radio" value="pencari">
                            <label class="flex items-center p-md border border-outline-variant rounded-xl cursor-pointer hover:border-primary-container transition-all" for="pencari">
                                <div class="w-5 h-5 border-2 border-outline rounded-full flex items-center justify-center mr-md radio-circle transition-colors">
                                    <div class="w-2.5 h-2.5 bg-on-primary rounded-full opacity-0 radio-inner transition-opacity"></div>
                                </div>
                                <span class="font-label-md text-label-md text-on-surface">Pencari Kos</span>
                            </label>
                        </div>
                        <div>
                            <input {{ old('role') === 'pemilik' ? 'checked' : '' }} class="hidden custom-radio" id="pemilik" name="role" type="radio" value="pemilik">
                            <label class="flex items-center p-md border border-outline-variant rounded-xl cursor-pointer hover:border-primary-container transition-all" for="pemilik">
                                <div class="w-5 h-5 border-2 border-outline rounded-full flex items-center justify-center mr-md radio-circle transition-colors">
                                    <div class="w-2.5 h-2.5 bg-on-primary rounded-full opacity-0 radio-inner transition-opacity"></div>
                                </div>
                                <span class="font-label-md text-label-md text-on-surface">Pemilik Kos</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Input Fields -->
                <div class="space-y-md">
                    <div class="space-y-xs">
                        <label class="font-label-sm text-label-sm text-on-surface-variant" for="name">Nama Lengkap</label>
                        <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-body-md"
                               id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" type="text" required>
                    </div>
                    <div class="space-y-xs">
                        <label class="font-label-sm text-label-sm text-on-surface-variant" for="email">Email</label>
                        <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-body-md"
                               id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" type="email" required>
                    </div>
                    <div class="space-y-xs">
                        <label class="font-label-sm text-label-sm text-on-surface-variant" for="whatsapp">Nomor WhatsApp</label>
                        <div class="relative">
                            <span class="absolute left-md top-1/2 -translate-y-1/2 text-secondary font-label-md">+62</span>
                            <input class="w-full pl-14 pr-md py-sm bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-body-md"
                                   id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="812 3456 7890" type="tel">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                        <div class="space-y-xs">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="password">Kata Sandi</label>
                            <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-body-md"
                                   id="password" name="password" placeholder="••••••••" type="password" required>
                        </div>
                        <div class="space-y-xs">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="password_confirmation">Konfirmasi Kata Sandi</label>
                            <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-body-md"
                                   id="password_confirmation" name="password_confirmation" placeholder="••••••••" type="password" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button class="w-full bg-primary text-on-primary font-headline-sm text-headline-sm py-md rounded-xl hover:bg-on-primary-fixed-variant transition-all duration-300 shadow-lg shadow-primary/20 active:scale-[0.98]" type="submit">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-xl text-center">
                <p class="font-body-sm text-body-sm text-secondary">
                    Sudah punya akun?
                    <a class="text-primary font-bold hover:underline" href="{{ url('/login') }}">Masuk di sini</a>
                </p>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-surface-container-low border-t border-outline-variant py-lg">
    <div class="px-margin-mobile md:px-margin-desktop max-w-max-width mx-auto flex flex-col md:flex-row justify-between items-center text-secondary font-body-sm text-body-sm">
        <div class="mb-md md:mb-0">© 2024 KosKita. Hak cipta dilindungi.</div>
        <div class="flex space-x-lg">
            <a class="hover:text-primary transition-colors" href="#">Syarat & Ketentuan</a>
            <a class="hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
            <a class="hover:text-primary transition-colors" href="#">Hubungi Kami</a>
        </div>
    </div>
</footer>

</body>
</html>

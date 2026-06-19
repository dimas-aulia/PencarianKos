<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="KosKita — Temukan kos impianmu di Yogyakarta dan seluruh Indonesia. Cari kamar terjangkau dengan filter fasilitas, tipe, dan lokasi.">
    <title>KosKita - Temukan Kamar Impianmu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

    <!-- ===== Top Navigation Bar ===== -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <div class="nav-left">
                <a href="{{ url('/') }}" class="brand-logo">KosKita</a>
                <div class="nav-links" id="nav-links">
                    <a href="{{ url('/') }}" class="nav-link active" id="nav-find-rooms">Cari Kamar</a>
                    <a href="#" class="nav-link" id="nav-for-owners">Syarat & Ketentuan</a>
                    <a href="#" class="nav-link" id="nav-about">Pusat Bantuan</a>
                </div>
            </div>
            <div class="nav-right">
                <button class="btn-mobile-menu" id="btn-mobile-menu" aria-label="Toggle menu">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                @auth
                    <span class="nav-user-name" style="color: var(--on-surface); font-weight: 600; font-size: 14px; margin-right: 8px;">
                        <span class="material-symbols-outlined" style="font-size: 18px; vertical-align: middle; margin-right: 4px;">person</span>
                        {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-nav-login" style="cursor: pointer;">Keluar</button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="btn-nav-login" style="text-decoration: none;">Masuk</a>
                    <a href="{{ url('/register') }}" class="btn-nav-register" style="text-decoration: none;">Daftar</a>
                @endauth
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <a href="{{ url('/') }}" class="mobile-link active">Cari Kamar</a>
            <a href="#" class="mobile-link">Pusat Bantuan</a>
            <a href="#" class="mobile-link">Syarat dan ketentuan</a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-link" style="background: none; border: none; cursor: pointer; width: 100%; text-align: left;">Keluar</button>
                </form>
            @else
                <a href="{{ url('/login') }}" class="mobile-link">Masuk</a>
                <a href="{{ url('/register') }}" class="mobile-link">Daftar</a>
            @endauth
        </div>
    </nav>

    <!-- ===== Hero Section ===== -->
    <section class="hero" id="hero-section">
        <div class="hero-bg">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdhsZebbhp-YSnFn6CDHxgF5QSlulL_8HQrt8n9XEvLSHXg07wk79VJMe7LDRz8tqbV0blh0r81uCRdKXY4Dg4AsoquoRzUQpJqUg1JRHgbSyQZSGk84BXlvp2zyPqvKoT5mC-vilWf7OhI9iM9MEDer6wdodsPBHbH28nS6nbxaa3CZ7gVkCX-4EFkkR5p4OZnuVKJDWol-XcOa1DFFpcGfCyJZ3JYKnv0M60IymQ7kudLn2IXdO-89v42iSeVvx7Zdg0tUWPI4Ep"
                alt="Modern bedroom interior" class="hero-bg-img" loading="eager">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <h1 class="hero-title" id="hero-title">Temukan Kamar Impianmu   </h1>
            <div class="search-box" id="search-box">
                <div class="search-icon-wrapper">
                    <span class="material-symbols-outlined search-icon">location_on</span>
                </div>
                <input type="text" class="search-input" id="search-input" placeholder="Cari kota, contoh: Yogyakarta"
                    aria-label="Cari kota">
                <div class="search-divider"></div>
                <button class="btn-search" id="btn-search">
                    <span class="material-symbols-outlined">search</span>
                    <span class="search-text">Cari</span>
                </button>
            </div>
        </div>
    </section>

    <!-- ===== Main Content ===== -->
    <div class="main-layout" id="main-content">

        <!-- Sidebar Filters -->
        <aside class="filter-sidebar" id="filter-sidebar">
            <div class="filter-header">
                <h2 class="filter-title">Filter</h2>
                <p class="filter-subtitle">Persempit pencarianmu</p>
            </div>

            <div class="filter-section">
                <h3 class="filter-label">Tipe Kamar</h3>
                <div class="filter-options">
                    <label class="filter-checkbox-label" for="type-putra">
                        <input type="checkbox" class="filter-checkbox" id="type-putra" name="room-type" value="putra">
                        <span class="checkbox-text">Putra</span>
                    </label>
                    <label class="filter-checkbox-label" for="type-putri">
                        <input type="checkbox" class="filter-checkbox" id="type-putri" name="room-type" value="putri">
                        <span class="checkbox-text">Putri</span>
                    </label>
                    <label class="filter-checkbox-label" for="type-campur">
                        <input type="checkbox" class="filter-checkbox" id="type-campur" name="room-type" value="campur">
                        <span class="checkbox-text">Campur</span>
                    </label>
                </div>
            </div>

            <div class="filter-section filter-section-border">
                <h3 class="filter-label">Fasilitas Kamar</h3>
                <div class="filter-options">
                    <label class="filter-checkbox-label" for="fac-ac">
                        <input type="checkbox" class="filter-checkbox" id="fac-ac" name="facility" value="ac">
                        <span class="checkbox-text">AC</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-wifi">
                        <input type="checkbox" class="filter-checkbox" id="fac-wifi" name="facility" value="wifi">
                        <span class="checkbox-text">Wi-Fi</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-bed">
                        <input type="checkbox" class="filter-checkbox" id="fac-bed" name="facility" value="bed">
                        <span class="checkbox-text">Kasur</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-bathroom">
                        <input type="checkbox" class="filter-checkbox" id="fac-bathroom" name="facility" value="bathroom">
                        <span class="checkbox-text">KM Dalam</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-bathroom-outside">
                        <input type="checkbox" class="filter-checkbox" id="fac-bathroom-outside" name="facility" value="bathroom_outside">
                        <span class="checkbox-text">KM Luar</span>
                    </label>
                </div>
            </div>

            <div class="filter-section filter-section-border">
                <h3 class="filter-label">Fasilitas Bersama & Parkir</h3>
                <div class="filter-options">
                    <label class="filter-checkbox-label" for="fac-kitchen">
                        <input type="checkbox" class="filter-checkbox" id="fac-kitchen" name="facility" value="kitchen">
                        <span class="checkbox-text">Dapur</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-parking-motor">
                        <input type="checkbox" class="filter-checkbox" id="fac-parking-motor" name="facility" value="parking_motorcycle">
                        <span class="checkbox-text">Parkir Motor</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-parking-car">
                        <input type="checkbox" class="filter-checkbox" id="fac-parking-car" name="facility" value="parking_car">
                        <span class="checkbox-text">Parkir Mobil</span>
                    </label>
                </div>
            </div>

            <button class="btn-apply-filter" id="btn-apply-filter">Terapkan Filter</button>
        </aside>

        <!-- Property Cards Grid -->
        <main class="property-grid-wrapper" id="property-grid-wrapper">
            <div class="property-grid" id="property-grid">
                <!-- Cards are rendered dynamically by home.js from kosDataDB -->
            </div>
        </main>
    </div>

    <!-- ===== Footer ===== -->
    <footer class="site-footer" id="site-footer">
        <div class="footer-inner">
            <span class="footer-brand">KosKita</span>
            <div class="footer-links">
                <a href="#" class="footer-link" id="footer-about">Tentang Kami</a>
                <a href="#" class="footer-link" id="footer-terms">Pasang Iklan Kos</a>
                <a href="#" class="footer-link" id="footer-privacy">Pusat Bantuan</a>
                <a href="#" class="footer-link" id="footer-support">Syarat & Ketentuan</a>
                <a href="#" class="footer-link" id="footer-list">Kebijakan Privasi</a>
            </div>
            <span class="footer-copy">&copy; 2026 KosKita. All rights reserved</span>
        </div>
    </footer>

    <script>
        window.kosDataDB = @json($kosData);
    </script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>
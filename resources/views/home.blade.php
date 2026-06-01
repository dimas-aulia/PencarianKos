<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="KosKita — Find your perfect room rental (kos) in Yogyakarta and across Indonesia. Browse affordable rooms with filters for facilities, type, and location.">
    <title>KosKita - Find Your Perfect Room</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

    <!-- ===== Top Navigation Bar ===== -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <div class="nav-left">
                <a href="home.html" class="brand-logo">KosKita</a>
                <div class="nav-links" id="nav-links">
                    <a href="home.html" class="nav-link active" id="nav-find-rooms">Find Rooms</a>
                    <a href="#" class="nav-link" id="nav-for-owners">For Owners</a>
                    <a href="#" class="nav-link" id="nav-about">About Us</a>
                </div>
            </div>
            <div class="nav-right">
                <button class="btn-mobile-menu" id="btn-mobile-menu" aria-label="Toggle menu">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <button class="btn-nav-login" id="btn-nav-login">Login</button>
                <button class="btn-nav-register" id="btn-nav-register">Register</button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <a href="home.html" class="mobile-link active">Find Rooms</a>
            <a href="#" class="mobile-link">For Owners</a>
            <a href="#" class="mobile-link">About Us</a>
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
            <h1 class="hero-title" id="hero-title">Find Your Perfect Stay</h1>
            <div class="search-box" id="search-box">
                <div class="search-icon-wrapper">
                    <span class="material-symbols-outlined search-icon">location_on</span>
                </div>
                <input type="text" class="search-input" id="search-input" placeholder="Search city, e.g., Yogyakarta"
                    aria-label="Search city">
                <div class="search-divider"></div>
                <button class="btn-search" id="btn-search">
                    <span class="material-symbols-outlined">search</span>
                    <span class="search-text">Search</span>
                </button>
            </div>
        </div>
    </section>

    <!-- ===== Main Content ===== -->
    <div class="main-layout" id="main-content">

        <!-- Sidebar Filters -->
        <aside class="filter-sidebar" id="filter-sidebar">
            <div class="filter-header">
                <h2 class="filter-title">Filters</h2>
                <p class="filter-subtitle">Refine your search</p>
            </div>

            <div class="filter-section">
                <h3 class="filter-label">Room Type</h3>
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
                <h3 class="filter-label">Facilities</h3>
                <div class="filter-options">
                    <label class="filter-checkbox-label" for="fac-ac">
                        <input type="checkbox" class="filter-checkbox" id="fac-ac" name="facility" value="ac" checked>
                        <span class="checkbox-text">AC</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-wifi">
                        <input type="checkbox" class="filter-checkbox" id="fac-wifi" name="facility" value="wifi"
                            checked>
                        <span class="checkbox-text">Wifi</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-bathroom">
                        <input type="checkbox" class="filter-checkbox" id="fac-bathroom" name="facility"
                            value="bathroom">
                        <span class="checkbox-text">Inside Bathroom</span>
                    </label>
                    <label class="filter-checkbox-label" for="fac-bed">
                        <input type="checkbox" class="filter-checkbox" id="fac-bed" name="facility" value="bed">
                        <span class="checkbox-text">Bed</span>
                    </label>
                </div>
            </div>

            <button class="btn-apply-filter" id="btn-apply-filter">Apply Filters</button>
        </aside>

        <!-- Property Cards Grid -->
        <main class="property-grid-wrapper" id="property-grid-wrapper">
            <div class="property-grid" id="property-grid">

                <!-- Card 1 -->
                <article class="property-card" id="card-1">
                    <div class="card-image-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1"
                            alt="Kost Exclusive Monjali room interior" class="card-image" loading="lazy">
                        <span class="card-badge badge-putri">Putri</span>
                        <button class="btn-favorite" id="fav-1" aria-label="Add to favorites">
                            <span class="material-symbols-outlined">favorite</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kost Exclusive Monjali</h3>
                        <p class="card-location">
                            <span class="material-symbols-outlined card-location-icon">location_on</span>
                            Sleman, Yogyakarta
                        </p>
                        <div class="card-footer">
                            <div class="card-price-wrapper">
                                <span class="card-price">Rp 1.200.000</span>
                                <span class="card-price-period">/ month</span>
                            </div>
                        </div>
                        <button class="btn-view-detail" id="detail-1">View Detail</button>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="property-card" id="card-2">
                    <div class="card-image-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5"
                            alt="Kost Premium Seturan room interior" class="card-image" loading="lazy">
                        <span class="card-badge badge-putra">Putra</span>
                        <button class="btn-favorite" id="fav-2" aria-label="Add to favorites">
                            <span class="material-symbols-outlined">favorite</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kost Premium Seturan</h3>
                        <p class="card-location">
                            <span class="material-symbols-outlined card-location-icon">location_on</span>
                            Depok, Sleman
                        </p>
                        <div class="card-footer">
                            <div class="card-price-wrapper">
                                <span class="card-price">Rp 1.500.000</span>
                                <span class="card-price-period">/ month</span>
                            </div>
                        </div>
                        <button class="btn-view-detail" id="detail-2">View Detail</button>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="property-card" id="card-3">
                    <div class="card-image-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl"
                            alt="Kost Minimalis Gejayan room interior" class="card-image" loading="lazy">
                        <span class="card-badge badge-campur">Campur</span>
                        <button class="btn-favorite" id="fav-3" aria-label="Add to favorites">
                            <span class="material-symbols-outlined">favorite</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kost Minimalis Gejayan</h3>
                        <p class="card-location">
                            <span class="material-symbols-outlined card-location-icon">location_on</span>
                            Gejayan, Yogyakarta
                        </p>
                        <div class="card-footer">
                            <div class="card-price-wrapper">
                                <span class="card-price">Rp 1.100.000</span>
                                <span class="card-price-period">/ month</span>
                            </div>
                        </div>
                        <button class="btn-view-detail" id="detail-3">View Detail</button>
                    </div>
                </article>

                <!-- Card 4 -->
                <article class="property-card" id="card-4">
                    <div class="card-image-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1"
                            alt="Kost Nyaman Condongcatur room interior" class="card-image" loading="lazy">
                        <span class="card-badge badge-putri">Putri</span>
                        <button class="btn-favorite" id="fav-4" aria-label="Add to favorites">
                            <span class="material-symbols-outlined">favorite</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kost Nyaman Condongcatur</h3>
                        <p class="card-location">
                            <span class="material-symbols-outlined card-location-icon">location_on</span>
                            Condongcatur, Sleman
                        </p>
                        <div class="card-footer">
                            <div class="card-price-wrapper">
                                <span class="card-price">Rp 950.000</span>
                                <span class="card-price-period">/ month</span>
                            </div>
                        </div>
                        <button class="btn-view-detail" id="detail-4">View Detail</button>
                    </div>
                </article>

                <!-- Card 5 -->
                <article class="property-card" id="card-5">
                    <div class="card-image-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5"
                            alt="Kost Modern Babarsari room interior" class="card-image" loading="lazy">
                        <span class="card-badge badge-putra">Putra</span>
                        <button class="btn-favorite" id="fav-5" aria-label="Add to favorites">
                            <span class="material-symbols-outlined">favorite</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kost Modern Babarsari</h3>
                        <p class="card-location">
                            <span class="material-symbols-outlined card-location-icon">location_on</span>
                            Babarsari, Sleman
                        </p>
                        <div class="card-footer">
                            <div class="card-price-wrapper">
                                <span class="card-price">Rp 1.350.000</span>
                                <span class="card-price-period">/ month</span>
                            </div>
                        </div>
                        <button class="btn-view-detail" id="detail-5">View Detail</button>
                    </div>
                </article>

                <!-- Card 6 -->
                <article class="property-card" id="card-6">
                    <div class="card-image-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl"
                            alt="Kost Strategis Jakal room interior" class="card-image" loading="lazy">
                        <span class="card-badge badge-campur">Campur</span>
                        <button class="btn-favorite" id="fav-6" aria-label="Add to favorites">
                            <span class="material-symbols-outlined">favorite</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kost Strategis Jakal</h3>
                        <p class="card-location">
                            <span class="material-symbols-outlined card-location-icon">location_on</span>
                            Jl. Kaliurang, Sleman
                        </p>
                        <div class="card-footer">
                            <div class="card-price-wrapper">
                                <span class="card-price">Rp 800.000</span>
                                <span class="card-price-period">/ month</span>
                            </div>
                        </div>
                        <button class="btn-view-detail" id="detail-6">View Detail</button>
                    </div>
                </article>

            </div>
        </main>
    </div>

    <!-- ===== Footer ===== -->
    <footer class="site-footer" id="site-footer">
        <div class="footer-inner">
            <span class="footer-brand">KosKita</span>
            <div class="footer-links">
                <a href="#" class="footer-link" id="footer-terms">Terms of Service</a>
                <a href="#" class="footer-link" id="footer-privacy">Privacy Policy</a>
                <a href="#" class="footer-link" id="footer-support">Contact Support</a>
                <a href="#" class="footer-link" id="footer-list">List Your Property</a>
            </div>
            <span class="footer-copy">&copy; 2024 KosKita. All rights reserved.</span>
        </div>
    </footer>

    <script src="home.js"></script>
</body>

</html>
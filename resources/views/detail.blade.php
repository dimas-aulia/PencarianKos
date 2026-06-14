<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $kos['name'] }} - KosKita</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; margin: 0; }

        /* === Two Column Layout === */
        .detail-content {
            display: block;
        }
        @media (min-width: 1024px) {
            .detail-content {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 40px;
                align-items: start;
            }
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container": "#eceef0",
                        "on-secondary-container": "#54647a",
                        "surface": "#f7f9fb",
                        "primary": "#006c49",
                        "primary-container": "#10b981",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#00422b",
                        "on-surface": "#191c1e",
                        "on-surface-variant": "#3c4a42",
                        "secondary": "#505f76",
                        "outline": "#6c7a71",
                        "outline-variant": "#bbcabf",
                        "surface-container-low": "#f2f4f6",
                        "surface-container-highest": "#e0e3e5",
                        "surface-variant": "#e0e3e5",
                        "on-primary-fixed-variant": "#005236",
                        "error": "#ba1a1a",
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900">

<!-- ===== TopNavBar ===== -->
<header style="position: fixed; top: 0; left: 0; width: 100%; z-index: 50; background: #f7f9fb; border-bottom: 1px solid #bbcabf; height: 72px;">
    <div style="max-width: 1280px; margin: 0 auto; height: 100%; display: flex; justify-content: space-between; align-items: center; padding: 0 24px;">
        <div class="flex items-center gap-6 flex-1">
            <a href="{{ url('/') }}" class="text-xl font-bold text-primary no-underline">KosKita</a>
            <!-- Search Bar -->
            <div class="hidden md:flex items-center bg-gray-100 border border-gray-200 rounded-full px-4 py-1.5 w-full max-w-md">
                <span class="material-symbols-outlined text-gray-400">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-sm w-full ml-2 outline-none" placeholder="Cari Kost..." type="text" value="{{ $kos['location'] }}">
            </div>
        </div>
        <nav class="flex items-center gap-4 ml-6">
            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ url('/') }}" class="text-sm text-gray-600 hover:text-primary transition-colors no-underline">Cari Kost</a>
                <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors no-underline">Bantuan</a>
            </div>
            <div class="flex items-center gap-3 border-l border-gray-200 pl-4">
                @auth
                    <span class="text-sm text-gray-700 hidden md:inline font-medium">{{ Auth::user()->name }}</span>
                    <div class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-primary transition-colors bg-transparent border-none cursor-pointer">Keluar</button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="text-sm text-gray-600 hover:text-primary transition-colors no-underline">Masuk</a>
                    <a href="{{ url('/register') }}" class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium no-underline">Daftar</a>
                @endauth
            </div>
        </nav>
    </div>
</header>

<!-- ===== Main Content ===== -->
<main style="padding-top: 96px; padding-bottom: 64px;">
    <div style="max-width: 1280px; margin: 0 auto; padding: 0 24px;">

        <!-- Breadcrumb -->
        <nav class="mb-4 text-sm text-gray-500">
            <a href="{{ url('/') }}" class="hover:text-primary transition-colors no-underline text-gray-500">Beranda</a>
            <span class="mx-1">›</span>
            <span class="text-gray-800 font-medium">{{ $kos['name'] }}</span>
        </nav>

        <!-- ============================================ -->
        <!-- BAGIAN 1: GALERI FOTO (Full Width, Terpisah) -->
        <!-- ============================================ -->
        @php
            $galleryPhotos = $kos['gallery'] ?? [];
            $allPhotos = [['src' => $kos['image'], 'alt' => $kos['name'] . ' - Foto Utama']];
            foreach ($galleryPhotos as $idx => $photoUrl) {
                $allPhotos[] = ['src' => $photoUrl, 'alt' => $kos['name'] . ' - Foto ' . ($idx + 2)];
            }
        @endphp
        <div style="margin-bottom: 40px;">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 8px; border-radius: 16px; overflow: hidden;">
                <!-- Foto Utama (Besar, Kiri) -->
                <div style="overflow: hidden; position: relative; background: #f3f4f6; aspect-ratio: 16/9;" class="group cursor-pointer" onclick="openPhotoModal(0)">
                    <img alt="{{ $kos['name'] }}"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: center; transition: transform 0.5s;"
                         class="group-hover:scale-[1.03]"
                         src="{{ $kos['image'] }}">
                </div>
                <!-- 2 Foto Kecil Kanan (Ditumpuk) -->
                <div style="display: grid; grid-template-rows: 1fr 1fr; gap: 8px;">
                    <div style="overflow: hidden; position: relative; background: #f3f4f6;" class="group cursor-pointer" onclick="openPhotoModal(1)">
                        <img style="width: 100%; height: 100%; object-fit: cover; object-position: center; transition: transform 0.5s;"
                             class="group-hover:scale-[1.03]"
                             alt="{{ $allPhotos[1]['alt'] ?? 'Foto 2' }}"
                             src="{{ $allPhotos[1]['src'] ?? $kos['image'] }}">
                        <!-- Tombol Lihat Semua Foto -->
                        <button onclick="event.stopPropagation(); openPhotoModal(0)"
                                style="position: absolute; top: 12px; right: 12px; background: rgba(255,255,255,0.95); border: none; padding: 8px 14px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; color: #1a1a1a; box-shadow: 0 2px 8px rgba(0,0,0,0.15); backdrop-filter: blur(4px); transition: all 0.2s;">
                            <span class="material-symbols-outlined" style="font-size: 18px;">grid_view</span>
                            Lihat semua foto
                        </button>
                    </div>
                    <div style="overflow: hidden; position: relative; background: #f3f4f6;" class="group cursor-pointer" onclick="openPhotoModal(2)">
                        <img style="width: 100%; height: 100%; object-fit: cover; object-position: center; transition: transform 0.5s;"
                             class="group-hover:scale-[1.03]"
                             alt="{{ $allPhotos[2]['alt'] ?? 'Foto 3' }}"
                             src="{{ $allPhotos[2]['src'] ?? $kos['image'] }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- MODAL: Lihat Semua Foto (Fullscreen)         -->
        <!-- ============================================ -->
        <div id="photoModal" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0,0,0,0.85); backdrop-filter: blur(8px); overflow-y: auto; opacity: 0; transition: opacity 0.3s ease;">
            <div style="position: sticky; top: 0; z-index: 10; display: flex; justify-content: space-between; align-items: center; padding: 16px 24px; background: rgba(0,0,0,0.6); backdrop-filter: blur(12px);">
                <h2 style="color: white; font-size: 18px; font-weight: 700; margin: 0;">Semua Foto - {{ $kos['name'] }}</h2>
                <button onclick="closePhotoModal()" style="background: rgba(255,255,255,0.15); border: none; color: white; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.3)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                    <span class="material-symbols-outlined" style="font-size: 24px;">close</span>
                </button>
            </div>
            <div style="max-width: 900px; margin: 24px auto; padding: 0 24px 48px;">
                @foreach ($allPhotos as $idx => $photo)
                    @if ($idx === 0)
                        <div style="margin-bottom: 8px; border-radius: 12px; overflow: hidden;">
                            <img src="{{ $photo['src'] }}" alt="{{ $photo['alt'] }}" style="width: 100%; display: block; object-fit: cover; max-height: 500px;">
                        </div>
                    @endif
                @endforeach
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                    @foreach ($allPhotos as $idx => $photo)
                        @if ($idx > 0)
                            <div style="border-radius: 12px; overflow: hidden;">
                                <img src="{{ $photo['src'] }}" alt="{{ $photo['alt'] }}" style="width: 100%; display: block; object-fit: cover; aspect-ratio: 4/3;">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- ============================================= -->
        <!-- BAGIAN 2: DUA KOLOM (Konten + Kotak WA)       -->
        <!-- ============================================= -->
        <div class="detail-content">

            <!-- KOLOM KIRI: Info + Fasilitas + Deskripsi + Peraturan + Map -->
            <div class="space-y-6">
                <!-- Judul & Lokasi -->
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">{{ $kos['name'] }}</h1>
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm font-medium">{{ $kos['type'] }}</span>
                        <div class="flex items-center text-gray-500 text-sm">
                            <span class="material-symbols-outlined text-primary mr-1 text-[18px]">location_on</span>
                            {{ $kos['location'] }}
                        </div>
                        @if ($kos['address'])
                            <div class="flex items-center text-gray-400 text-xs">
                                <span class="mx-1">•</span>
                                {{ $kos['address'] }}
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Info Pemilik -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-lg shrink-0">
                        {{ strtoupper(substr($kos['owner'], 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 m-0">Kos dikelola oleh</p>
                        <p class="text-base font-semibold text-gray-900 m-0">{{ $kos['owner'] }}</p>
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- ============================== -->
                <!-- 1. FASILITAS KOS — BERKATEGORI -->
                <!-- ============================== -->
                @php
                    // Normalize facilities list to lowercase for matching
                    $rawFacilities = array_map(function($f) { return strtolower(trim($f)); }, $kos['facilities']);

                    // Define facility categories with icon mapping
                    $categories = [
                        'Fasilitas Kamar' => [
                            'ac'               => ['icon' => 'ac_unit',     'label' => 'AC'],
                            'wifi'             => ['icon' => 'wifi',        'label' => 'Wi-Fi'],
                            'kasur'            => ['icon' => 'bed',         'label' => 'Kasur'],
                            'kamar mandi dalam'=> ['icon' => 'shower',      'label' => 'KM Dalam'],
                            'kamar mandi luar' => ['icon' => 'bathroom',    'label' => 'KM Luar'],
                        ],
                        'Fasilitas Bersama' => [
                            'dapur'            => ['icon' => 'cooking',     'label' => 'Dapur'],
                        ],
                        'Fasilitas Parkir' => [
                            'parkir motor'     => ['icon' => 'two_wheeler', 'label' => 'Parkir Motor'],
                            'parkir mobil'     => ['icon' => 'directions_car', 'label' => 'Parkir Mobil'],
                        ],
                    ];
                @endphp

                @foreach ($categories as $catName => $facilities)
                    @php
                        // Filter only the facilities that this kos actually has
                        $activeFacilities = array_filter($facilities, function($key) use ($rawFacilities) {
                            return in_array($key, $rawFacilities);
                        }, ARRAY_FILTER_USE_KEY);
                    @endphp

                    @if (count($activeFacilities) > 0)
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 mb-4">{{ $catName }}</h2>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                @foreach ($activeFacilities as $key => $fac)
                                    <div class="flex flex-col items-center gap-2 p-4 rounded-xl border border-gray-200 bg-white shadow-sm hover:border-emerald-200 hover:shadow-md transition-all">
                                        <span class="material-symbols-outlined text-primary text-[28px]">{{ $fac['icon'] }}</span>
                                        <span class="text-sm text-gray-700 text-center font-medium">{{ $fac['label'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach

                <hr class="border-gray-200">

                <!-- ===================== -->
                <!-- 2. DESKRIPSI KOS      -->
                <!-- ===================== -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Deskripsi Kos</h2>
                    <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $kos['description'] }}</p>
                </div>

                <hr class="border-gray-200">

                <!-- ===================== -->
                <!-- 3. PERATURAN KOS      -->
                <!-- ===================== -->
                @if (!empty($kos['peraturan']))
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-4">Peraturan Kos</h2>
                        <ul class="space-y-2.5">
                            @foreach (explode("\n", $kos['peraturan']) as $rule)
                                @if (trim($rule))
                                    <li class="flex items-start gap-3 text-sm text-gray-600">
                                        <span class="material-symbols-outlined text-emerald-500 text-[18px] mt-0.5 shrink-0" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        <span>{{ trim($rule) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <hr class="border-gray-200">
                @endif

                <!-- ========================== -->
                <!-- 4. LOKASI GOOGLE MAPS      -->
                <!-- ========================== -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Lokasi Kos</h2>
                    <div class="rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                        @if (!empty($kos['google_maps']))
                            <iframe
                                src="{{ $kos['google_maps'] }}"
                                width="100%"
                                height="350"
                                style="border:0; display: block;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        @else
                            <div class="w-full bg-gray-100 flex flex-col items-center justify-center gap-3 text-gray-400" style="height: 350px;">
                                <span class="material-symbols-outlined text-5xl">map</span>
                                <p class="text-sm">Lokasi peta belum tersedia</p>
                            </div>
                        @endif
                    </div>
                    @if ($kos['address'])
                        <p class="text-sm text-gray-500 mt-3 flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[16px]">pin_drop</span>
                            {{ $kos['address'] }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- KOLOM KANAN: Kotak Harga + WhatsApp (Sticky) -->
            <div>
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-md" style="position: sticky; top: 96px;">
                    <!-- Harga -->
                    <div class="mb-5 pb-5 border-b border-gray-100">
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Mulai dari</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-bold text-primary">{{ $kos['priceFormatted'] }}</span>
                            <span class="text-gray-400 text-sm">/ bulan</span>
                        </div>
                    </div>

                    <!-- Tipe & Lokasi ringkas -->
                    <div class="mb-5 pb-5 border-b border-gray-100 space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined text-[18px] text-primary">apartment</span>
                            <span>Tipe: <strong>{{ $kos['type'] }}</strong></span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
                            <span>{{ $kos['location'] }}</span>
                        </div>
                    </div>

                    <!-- Tombol WhatsApp -->
                    <a href="https://wa.me/{{ $kos['whatsapp'] }}?text={{ urlencode('Halo, saya tertarik dengan ' . $kos['name'] . '. Apakah masih tersedia?') }}"
                       target="_blank"
                       style="display: block; width: 100%; background: #25D366; color: white; font-weight: 700; padding: 14px 0; border-radius: 12px; text-align: center; text-decoration: none; transition: all 0.2s;"
                       class="hover:shadow-lg hover:opacity-95">
                        <span class="inline-flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Hubungi via WhatsApp
                        </span>
                    </a>

                    <!-- Info Pemilik mini -->
                    <div class="mt-5 pt-5 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm shrink-0">
                            {{ strtoupper(substr($kos['owner'], 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 m-0">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-800 m-0">{{ $kos['owner'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- ===== Footer ===== -->
<footer class="w-full py-8 px-6 md:px-16 flex flex-col md:flex-row justify-between items-center gap-4 border-t border-gray-200 bg-gray-50">
    <div class="flex flex-col items-center md:items-start gap-1">
        <a href="{{ url('/') }}" class="text-lg font-bold text-gray-900 no-underline">KosKita</a>
        <p class="text-sm text-gray-500">© 2026 KosKita. Hak cipta dilindungi.</p>
    </div>
    <div class="flex flex-wrap justify-center gap-6">
        <a class="text-sm text-gray-500 hover:text-primary transition-all no-underline" href="#">Tentang Kami</a>
        <a class="text-sm text-gray-500 hover:text-primary transition-all no-underline" href="#">Pusat Bantuan</a>
        <a class="text-sm text-gray-500 hover:text-primary transition-all no-underline" href="#">Syarat & Ketentuan</a>
        <a class="text-sm text-gray-500 hover:text-primary transition-all no-underline" href="#">Kebijakan Privasi</a>
    </div>
</footer>

<script>
    // === Photo Modal Functions ===
    function openPhotoModal(startIndex) {
        const modal = document.getElementById('photoModal');
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(() => {
            modal.style.opacity = '1';
        });
    }

    function closePhotoModal() {
        const modal = document.getElementById('photoModal');
        modal.style.opacity = '0';
        document.body.style.overflow = '';
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePhotoModal();
        }
    });

    document.getElementById('photoModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closePhotoModal();
        }
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Pemilik - KosKita</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#191c1e",
                        "on-primary": "#ffffff",
                        "surface-container-high": "#e6e8ea",
                        "surface-variant": "#e0e3e5",
                        "on-secondary-container": "#54647a",
                        "on-primary-fixed-variant": "#005236",
                        "on-error-container": "#93000a",
                        "on-tertiary-container": "#003d59",
                        "error": "#ba1a1a",
                        "surface-tint": "#006c49",
                        "primary-fixed-dim": "#4edea3",
                        "on-secondary-fixed": "#0b1c30",
                        "tertiary-fixed": "#c9e6ff",
                        "surface-dim": "#d8dadc",
                        "on-secondary": "#ffffff",
                        "on-error": "#ffffff",
                        "surface-bright": "#f7f9fb",
                        "surface-container-highest": "#e0e3e5",
                        "surface-container-low": "#f2f4f6",
                        "inverse-surface": "#2d3133",
                        "secondary-container": "#d0e1fb",
                        "surface-container": "#eceef0",
                        "on-tertiary-fixed": "#001e2f",
                        "background": "#f7f9fb",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#002113",
                        "on-surface-variant": "#3c4a42",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed-variant": "#38485d",
                        "inverse-on-surface": "#eff1f3",
                        "outline-variant": "#bbcabf",
                        "surface": "#f7f9fb",
                        "primary-container": "#10b981",
                        "tertiary-fixed-dim": "#89ceff",
                        "primary": "#006c49",
                        "secondary-fixed": "#d3e4fe",
                        "on-primary-container": "#00422b",
                        "secondary": "#505f76",
                        "outline": "#6c7a71",
                        "on-tertiary-fixed-variant": "#004c6e",
                        "tertiary-container": "#23acf1",
                        "primary-fixed": "#6ffbbe",
                        "surface-container-lowest": "#ffffff",
                        "tertiary": "#006591",
                        "inverse-primary": "#4edea3",
                        "secondary-fixed-dim": "#b7c8e1",
                        "on-background": "#191c1e"
                    },
                    fontFamily: {
                        "sans": ["Inter", "sans-serif"],
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }
        .sidebar-link {
            transition: all 0.2s;
        }
        .sidebar-link:hover {
            background-color: rgba(16, 185, 129, 0.06);
        }
        .sidebar-active {
            background-color: rgba(16, 185, 129, 0.1);
            color: #006c49;
            font-weight: 700;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="flex min-h-screen text-on-surface">

<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-screen w-[280px] z-50 flex flex-col p-4 bg-surface-container-low border-r border-outline-variant">
    <div class="mb-8 px-2">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-primary no-underline">kosKita</a>
        <p class="text-xs text-secondary mt-0.5">Owner Portal</p>
    </div>
    <nav class="flex-1 space-y-1">
        <a class="flex items-center gap-4 px-4 py-2.5 sidebar-active" href="{{ route('owner.dashboard') }}">
            <span class="material-symbols-outlined">home_work</span>
            <span class="text-sm font-medium">Manage Kos</span>
        </a>
        <a class="flex items-center gap-4 px-4 py-2.5 sidebar-link text-secondary rounded-lg" href="#add-kos-form" onclick="document.getElementById('add-kos-form').scrollIntoView({behavior: 'smooth'})">
            <span class="material-symbols-outlined">add_business</span>
            <span class="text-sm font-medium">Tambah Kos</span>
        </a>
    </nav>
    <div class="mt-auto border-t border-outline-variant pt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-4 px-4 py-2.5 font-medium text-secondary hover:bg-surface-variant transition-all duration-200 rounded-lg w-full text-left bg-transparent border-none cursor-pointer">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm">Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="flex-1 ml-[280px] min-h-screen flex flex-col p-8 lg:p-16">
    <!-- Header -->
    <header class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-semibold leading-tight">Selamat Datang, {{ $user->name }}</h2>
            <p class="text-base text-secondary mt-1">Pantau dan kelola properti kos Anda dengan mudah.</p>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-secondary hover:bg-surface-variant rounded-full transition-colors">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-white font-bold text-lg">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
        </div>
    </header>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl mb-6 flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ===== Manage Kos Section ===== -->
    <section class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Kelola Kos</h3>
            <button class="flex items-center gap-1.5 bg-primary-container text-on-primary-container px-6 py-2.5 rounded-lg text-sm font-medium hover:opacity-90 transition-all active:scale-95 shadow-sm"
                    onclick="document.getElementById('add-kos-form').scrollIntoView({behavior: 'smooth'})">
                <span class="material-symbols-outlined" style="font-size: 20px; font-variation-settings: 'wght' 600;">add</span>
                Tambah Kos Baru
            </button>
        </div>

        <div class="bg-white rounded-xl border border-outline-variant overflow-hidden">
            @if ($kosList->isEmpty())
                <div class="text-center py-16 px-6">
                    <span class="material-symbols-outlined text-5xl text-gray-300 mb-4 block">home_work</span>
                    <h4 class="text-lg font-semibold text-gray-500 mb-2">Belum ada kos</h4>
                    <p class="text-sm text-gray-400">Tambahkan kos pertama Anda dengan mengklik tombol di atas.</p>
                </div>
            @else
                <table class="w-full text-left border-collapse">
                    <thead class="bg-surface-container-low border-b border-outline-variant">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold text-secondary uppercase tracking-wider">Foto</th>
                            <th class="px-6 py-3 text-xs font-semibold text-secondary uppercase tracking-wider">Nama Kos</th>
                            <th class="px-6 py-3 text-xs font-semibold text-secondary uppercase tracking-wider">Harga/Bulan</th>
                            <th class="px-6 py-3 text-xs font-semibold text-secondary uppercase tracking-wider">Tipe</th>
                            <th class="px-6 py-3 text-xs font-semibold text-secondary uppercase tracking-wider">Status Iklan</th>
                            <th class="px-6 py-3 text-xs font-semibold text-secondary uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @foreach ($kosList as $kos)
                            <tr class="hover:bg-surface-container transition-colors">
                                <td class="px-6 py-4">
                                    @if ($kos->foto_kos)
                                        <img alt="{{ $kos->nama_kos }}" class="w-16 h-12 rounded-lg object-cover" src="{{ $kos->foto_kos }}">
                                    @else
                                        <div class="w-16 h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-gray-300">image</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-semibold text-base">{{ $kos->nama_kos }}</td>
                                <td class="px-6 py-4 text-primary font-semibold">Rp {{ number_format($kos->harga_per_bulan, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $typeColors = [
                                            'Putra'  => 'bg-blue-50 text-blue-600',
                                            'Putri'  => 'bg-pink-50 text-pink-600',
                                            'Campur' => 'bg-amber-50 text-amber-600',
                                        ];
                                        $typeClass = $typeColors[$kos->tipe_kos] ?? 'bg-gray-50 text-gray-600';
                                    @endphp
                                    <span class="{{ $typeClass }} px-2.5 py-1 rounded-full text-xs font-semibold">{{ $kos->tipe_kos }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusMap = [
                                            'Approved' => ['class' => 'text-primary', 'dotClass' => 'bg-primary', 'label' => 'Disetujui'],
                                            'Pending'  => ['class' => 'text-secondary', 'dotClass' => 'bg-secondary', 'label' => 'Menunggu'],
                                            'Rejected' => ['class' => 'text-error', 'dotClass' => 'bg-error', 'label' => 'Ditolak'],
                                        ];
                                        $status = $statusMap[$kos->status] ?? $statusMap['Pending'];
                                    @endphp
                                    <span class="flex items-center gap-1.5 {{ $status['class'] }} text-xs font-semibold">
                                        <span class="w-2 h-2 rounded-full {{ $status['dotClass'] }}"></span>
                                        {{ $status['label'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('owner.kos.edit', $kos->id) }}" class="text-primary hover:scale-110 transition-transform p-1" title="Edit">
                                            <span class="material-symbols-outlined">edit</span>
                                        </a>
                                        <form method="POST" action="{{ route('owner.kos.destroy', $kos->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kos ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-error hover:scale-110 transition-transform bg-transparent border-none cursor-pointer p-1" title="Hapus">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>

    <!-- ===== Form Tambah Kos Section ===== -->
    <section class="bg-white rounded-xl border border-outline-variant p-8 shadow-sm mb-12" id="add-kos-form">
        <h3 class="text-xl font-semibold mb-8">Tambah Kos Baru</h3>
        <form action="{{ route('owner.kos.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-8" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Kolom Kiri Form -->
            <div class="space-y-6">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="nama_kos">Nama Kos</label>
                    <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary text-base" id="nama_kos" name="nama_kos" placeholder="Contoh: Kost Indah Jaya" type="text" value="{{ old('nama_kos') }}" required>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface">Tipe Kos</span>
                    <div class="flex gap-6 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input class="text-primary focus:ring-primary" name="tipe_kos" type="radio" value="Putra" {{ old('tipe_kos') == 'Putra' ? 'checked' : '' }}>
                            <span>Putra</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input class="text-primary focus:ring-primary" name="tipe_kos" type="radio" value="Putri" {{ old('tipe_kos') == 'Putri' ? 'checked' : '' }}>
                            <span>Putri</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input class="text-primary focus:ring-primary" name="tipe_kos" type="radio" value="Campur" {{ old('tipe_kos', 'Campur') == 'Campur' ? 'checked' : '' }}>
                            <span>Campur</span>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-medium text-on-surface" for="harga_per_bulan">Harga/Bulan (Rp)</label>
                        <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="harga_per_bulan" name="harga_per_bulan" placeholder="1000000" type="number" value="{{ old('harga_per_bulan') }}" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-medium text-on-surface" for="kota">Kota</label>
                        <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="kota" name="kota" placeholder="Yogyakarta" type="text" value="{{ old('kota') }}" required>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="alamat_lengkap">Alamat Lengkap</label>
                    <textarea class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="alamat_lengkap" name="alamat_lengkap" placeholder="Jl. Monjali No. 123..." rows="2" required>{{ old('alamat_lengkap') }}</textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="google_maps">Lokasi Google Maps (Embed Link)</label>
                    <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="google_maps" name="google_maps" placeholder="Tempel link embed Google Maps..." type="text" value="{{ old('google_maps') }}">
                    <p class="text-xs text-secondary mt-1">Buka Google Maps → Bagikan → Sematkan peta → Salin link src dari iframe</p>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="deskripsi">Deskripsi Kos</label>
                    <textarea class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="deskripsi" name="deskripsi" placeholder="Jelaskan kelebihan kos Anda, lingkungan sekitar, dll..." rows="3">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="peraturan">Peraturan Kos</label>
                    <textarea class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="peraturan" name="peraturan" placeholder="Satu peraturan per baris. Contoh:&#10;Maksimal bertamu jam 22.00&#10;Dilarang membawa hewan peliharaan" rows="3">{{ old('peraturan') }}</textarea>
                    <p class="text-xs text-secondary mt-1">Tulis satu peraturan per baris</p>
                </div>
            </div>

            <!-- Kolom Kanan Form -->
            <div class="space-y-6">
                <!-- Fasilitas Kamar -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface mb-1">Fasilitas Kamar</span>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach (['AC', 'Wifi', 'Kasur', 'Kamar Mandi Dalam', 'Kamar Mandi Luar'] as $fac)
                            <label class="flex items-center gap-2 p-2.5 rounded-lg border border-outline-variant hover:bg-surface-container transition-colors cursor-pointer">
                                <input class="text-primary rounded border-outline-variant focus:ring-primary" name="fasilitas[]" type="checkbox" value="{{ $fac }}" {{ is_array(old('fasilitas')) && in_array($fac, old('fasilitas')) ? 'checked' : '' }}>
                                <span class="text-sm">{{ $fac == 'Kamar Mandi Dalam' ? 'KM Dalam' : ($fac == 'Kamar Mandi Luar' ? 'KM Luar' : $fac) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Fasilitas Bersama & Umum -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface mb-1">Fasilitas Bersama & Umum</span>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach (['Dapur', 'Parkir Motor', 'Parkir Mobil'] as $fac)
                            <label class="flex items-center gap-2 p-2.5 rounded-lg border border-outline-variant hover:bg-surface-container transition-colors cursor-pointer">
                                <input class="text-primary rounded border-outline-variant focus:ring-primary" name="fasilitas[]" type="checkbox" value="{{ $fac }}" {{ is_array(old('fasilitas')) && in_array($fac, old('fasilitas')) ? 'checked' : '' }}>
                                <span class="text-sm">{{ $fac }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Upload Foto Utama -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface">Foto Utama Kos</span>
                    <div id="dropzone-main" class="border-2 border-dashed border-outline-variant rounded-xl p-6 flex flex-col items-center justify-center gap-3 bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer group">
                        <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-primary text-3xl">cloud_upload</span>
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-semibold text-primary">Klik untuk upload foto utama</p>
                            <p class="text-xs text-secondary">Format JPG atau PNG (Max 5MB)</p>
                        </div>
                        <input class="hidden" name="foto_kos" type="file" accept="image/*">
                    </div>
                </div>

                <!-- Upload Foto Galeri -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface">Foto Galeri Kos</span>
                    <div id="dropzone-gallery" class="border-2 border-dashed border-outline-variant rounded-xl p-6 flex flex-col items-center justify-center gap-3 bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer group">
                        <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-primary text-3xl">photo_library</span>
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-semibold text-primary">Klik atau seret foto galeri ke sini</p>
                            <p class="text-xs text-secondary">Maksimal 5 foto, format JPG atau PNG (Max 5MB/foto)</p>
                        </div>
                        <input class="hidden" name="foto_galeri[]" type="file" accept="image/*" multiple>
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button class="w-full bg-primary-container text-on-primary-container py-3.5 rounded-lg text-lg font-semibold shadow-sm hover:opacity-90 active:scale-[0.98] transition-all" type="submit">
                        Simpan Kos
                    </button>
                </div>
            </div>
        </form>
    </section>

    <!-- Footer -->
    <footer class="mt-auto pt-8 border-t border-outline-variant flex justify-between items-center pb-8">
        <p class="text-sm text-secondary">© 2026 kosKita Management. All rights reserved.</p>
        <div class="flex gap-6">
            <a class="text-xs font-semibold text-secondary hover:text-primary transition-colors" href="#">Tentang Kami</a>
            <a class="text-xs font-semibold text-secondary hover:text-primary transition-colors" href="#">Pusat Bantuan</a>
            <a class="text-xs font-semibold text-secondary hover:text-primary transition-colors" href="#">Syarat & Ketentuan</a>
            <a class="text-xs font-semibold text-secondary hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
        </div>
    </footer>
</main>

<script>
    // Dropzone click handlers
    document.querySelectorAll('[id^="dropzone-"]').forEach(zone => {
        zone.addEventListener('click', () => {
            zone.querySelector('input[type="file"]').click();
        });

        zone.addEventListener('dragover', (e) => {
            e.preventDefault();
            zone.classList.add('border-primary', 'bg-emerald-50/30');
        });

        zone.addEventListener('dragleave', () => {
            zone.classList.remove('border-primary', 'bg-emerald-50/30');
        });

        zone.addEventListener('drop', (e) => {
            e.preventDefault();
            zone.classList.remove('border-primary', 'bg-emerald-50/30');
            const input = zone.querySelector('input[type="file"]');
            input.files = e.dataTransfer.files;
            updateDropzoneLabel(zone, e.dataTransfer.files);
        });

        // Update label when files are selected
        const input = zone.querySelector('input[type="file"]');
        input.addEventListener('change', () => {
            updateDropzoneLabel(zone, input.files);
        });
    });

    function updateDropzoneLabel(zone, files) {
        if (files.length > 0) {
            const label = zone.querySelector('.text-primary');
            const names = Array.from(files).map(f => f.name).join(', ');
            label.textContent = `${files.length} file dipilih`;
            label.closest('.text-center').querySelector('.text-secondary').textContent = names.length > 60 ? names.substring(0, 60) + '...' : names;
        }
    }
</script>
</body>
</html>

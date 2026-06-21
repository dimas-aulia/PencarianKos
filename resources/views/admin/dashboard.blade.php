<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>kosKita Admin Portal - Dashboard Moderasi</title>
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
                        "on-error-container": "#93000a",
                        "error": "#ba1a1a",
                        "surface-bright": "#f7f9fb",
                        "surface-container-highest": "#e0e3e5",
                        "surface-container-low": "#f2f4f6",
                        "secondary-container": "#d0e1fb",
                        "surface-container": "#eceef0",
                        "background": "#f7f9fb",
                        "error-container": "#ffdad6",
                        "on-surface-variant": "#3c4a42",
                        "outline-variant": "#bbcabf",
                        "surface": "#f7f9fb",
                        "primary-container": "#10b981",
                        "primary": "#006c49",
                        "on-primary-container": "#00422b",
                        "secondary": "#505f76",
                        "outline": "#6c7a71",
                        "tertiary": "#006591",
                        "tertiary-container": "#23acf1",
                        "on-tertiary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary": "#ffffff",
                        "on-error": "#ffffff",
                        "primary-fixed-dim": "#4edea3",
                    },
                    fontFamily: {
                        "sans": ["Inter", "sans-serif"],
                    },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface-container-low text-on-surface">

<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-screen w-72 flex flex-col bg-surface-container-low border-r border-outline-variant z-40 p-4">
    <div class="mb-12 px-2">
        <h1 class="text-2xl font-bold text-primary">kosKita</h1>
        <p class="text-sm text-on-surface-variant opacity-70">Portal Manajemen</p>
    </div>
    <nav class="flex-grow space-y-1">
        <a class="flex items-center gap-4 bg-primary-container text-on-primary-container rounded-lg px-4 py-2.5 transition-colors duration-150" href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined">fact_check</span>
            <span class="text-sm font-medium">Validasi Kos</span>
        </a>
    </nav>
    <div class="mt-auto border-t border-outline-variant pt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-4 text-error hover:bg-error-container rounded-lg px-4 py-2.5 transition-colors duration-150 w-full text-left bg-transparent border-none cursor-pointer">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm font-medium">Keluar</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-72 min-h-screen">
    <!-- Top Bar -->
    <header class="h-16 flex justify-between items-center px-8 bg-surface border-b border-outline-variant sticky top-0 z-30">
        <div class="flex flex-col">
            <h2 class="text-xl font-semibold text-on-surface">Dashboard Moderasi Admin</h2>
            <p class="text-sm text-on-surface-variant">Periksa dan validasi pengajuan iklan kos baru di sistem kosKita.</p>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4">
                <button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">notifications</button>
            </div>
            <div class="h-8 w-px bg-outline-variant"></div>
            <div class="flex items-center gap-2">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-medium text-on-surface">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-on-surface-variant">Administrator</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold text-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="p-8 max-w-7xl mx-auto">

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl mb-6 flex items-center gap-3">
                <span class="material-symbols-outlined">check_circle</span>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Menunggu Validasi -->
            <div class="bg-white p-8 rounded-xl border border-outline-variant hover:border-primary-container transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <span class="material-symbols-outlined text-tertiary p-2 bg-sky-50 rounded-lg">pending_actions</span>
                    <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded-full uppercase tracking-wider">Menunggu</span>
                </div>
                <p class="text-sm font-medium text-on-surface-variant mb-1">Menunggu Validasi</p>
                <h3 class="text-4xl font-bold text-on-surface">{{ $pendingCount }}</h3>
                <div class="mt-4 flex items-center gap-1 text-primary text-xs">
                    <span class="material-symbols-outlined text-sm">trending_up</span>
                    <span>Perlu ditinjau</span>
                </div>
            </div>
            <!-- Total Iklan Aktif -->
            <div class="bg-white p-8 rounded-xl border border-outline-variant hover:border-primary-container transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <span class="material-symbols-outlined text-primary p-2 bg-emerald-50 rounded-lg">visibility</span>
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded-full uppercase tracking-wider">Disetujui</span>
                </div>
                <p class="text-sm font-medium text-on-surface-variant mb-1">Total Iklan Aktif</p>
                <h3 class="text-4xl font-bold text-on-surface">{{ $approvedCount }}</h3>
                <div class="mt-4 flex items-center gap-1 text-primary text-xs">
                    <span class="material-symbols-outlined text-sm">check_circle</span>
                    <span>Tampil di halaman utama</span>
                </div>
            </div>
            <!-- Total Pemilik Kos -->
            <div class="bg-white p-8 rounded-xl border border-outline-variant hover:border-primary-container transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <span class="material-symbols-outlined text-secondary p-2 bg-blue-50 rounded-lg">real_estate_agent</span>
                </div>
                <p class="text-sm font-medium text-on-surface-variant mb-1">Total Pemilik Kos</p>
                <h3 class="text-4xl font-bold text-on-surface">{{ $ownerCount }}</h3>
                <div class="mt-4 flex items-center gap-1 text-on-surface-variant text-xs">
                    <span class="material-symbols-outlined text-sm">update</span>
                    <span>Aktif mengelola properti</span>
                </div>
            </div>
        </div>

        <!-- Pending Kos Table -->
        <div class="bg-white rounded-xl border border-outline-variant overflow-hidden shadow-sm">
            <div class="px-8 py-6 border-b border-outline-variant flex justify-between items-center bg-surface-bright">
                <h3 class="text-xl font-semibold text-on-surface">Daftar Pengajuan Kos Baru (Menunggu)</h3>
                <div class="flex gap-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
                        <input id="searchInput" class="pl-10 pr-4 py-1.5 bg-surface border border-outline-variant rounded-lg text-sm focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="Cari nama kos..." type="text">
                    </div>
                </div>
            </div>

            @if ($pendingKos->isEmpty())
                <div class="text-center py-16 px-6">
                    <span class="material-symbols-outlined text-5xl text-gray-300 mb-4 block">task_alt</span>
                    <h4 class="text-lg font-semibold text-gray-500 mb-2">Semua bersih!</h4>
                    <p class="text-sm text-gray-400">Tidak ada pengajuan kos yang menunggu validasi saat ini.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-surface-container text-on-surface-variant text-xs font-semibold">
                                <th class="px-8 py-3 uppercase tracking-wider">Foto</th>
                                <th class="px-8 py-3 uppercase tracking-wider">Nama Kos</th>
                                <th class="px-8 py-3 uppercase tracking-wider">Pemilik</th>
                                <th class="px-8 py-3 uppercase tracking-wider">Harga</th>
                                <th class="px-8 py-3 uppercase tracking-wider">Kota</th>
                                <th class="px-8 py-3 uppercase tracking-wider">Status</th>
                                <th class="px-8 py-3 uppercase tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant">
                            @foreach ($pendingKos as $kos)
                                <tr class="hover:bg-surface-container-low transition-colors group searchable-row">
                                    <td class="px-8 py-4">
                                        @if ($kos->foto_kos)
                                            <img alt="{{ $kos->nama_kos }}" class="w-20 h-16 object-cover rounded-lg border border-outline-variant shadow-sm group-hover:scale-105 transition-transform" src="{{ $kos->foto_kos }}">
                                        @else
                                            <div class="w-20 h-16 rounded-lg bg-gray-100 flex items-center justify-center border border-outline-variant">
                                                <span class="material-symbols-outlined text-gray-300">image</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-8 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-base font-bold text-on-surface">{{ $kos->nama_kos }}</span>
                                            <span class="text-xs text-on-surface-variant mt-0.5">
                                                {{ Str::limit($kos->fasilitas, 40) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-4 text-base">{{ $kos->nama_pemilik ?? 'N/A' }}</td>
                                    <td class="px-8 py-4">
                                        <span class="text-primary font-bold text-base">Rp {{ number_format($kos->harga_per_bulan, 0, ',', '.') }}</span>
                                        <p class="text-[10px] text-on-surface-variant">per bulan</p>
                                    </td>
                                    <td class="px-8 py-4 text-base">{{ $kos->kota }}</td>
                                    <td class="px-8 py-4">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-[11px] font-bold rounded-full">Menunggu</span>
                                    </td>
                                    <td class="px-8 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Approve -->
                                            <form method="POST" action="{{ route('admin.kos.approve', $kos->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="flex items-center gap-1 px-4 py-2 bg-primary text-on-primary rounded-lg text-xs font-semibold hover:shadow-md transition-all active:scale-95">
                                                    <span class="material-symbols-outlined text-sm">check</span>
                                                    Setujui
                                                </button>
                                            </form>
                                            <!-- Reject -->
                                            <form method="POST" action="{{ route('admin.kos.reject', $kos->id) }}" onsubmit="return confirm('Yakin ingin menolak kos ini?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="flex items-center gap-1 px-4 py-2 border border-error text-error rounded-lg text-xs font-semibold hover:bg-error-container transition-all active:scale-95">
                                                    <span class="material-symbols-outlined text-sm">close</span>
                                                    Tolak
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <footer class="mt-12 pt-8 border-t border-outline-variant flex flex-col md:flex-row justify-between items-center text-on-surface-variant text-sm gap-4">
            <p>2026 kosKita Management. All rights reserved.</p>
            <div class="flex flex-wrap justify-center gap-x-8 gap-y-2">
                <a class="hover:text-primary transition-colors" href="#">Tentang Kami</a>
                <a class="hover:text-primary transition-colors" href="#">Pusat Bantuan</a>
                <a class="hover:text-primary transition-colors" href="#">Syarat & Ketentuan</a>
                <a class="hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
            </div>
        </footer>
    </div>
</main>

<script>
    // Search filter for table rows
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            document.querySelectorAll('.searchable-row').forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    }
</script>
</body>
</html>

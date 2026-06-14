<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Kos - {{ $kos->nama_kos }} - KosKita</title>
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
                        "error": "#ba1a1a",
                        "surface-bright": "#f7f9fb",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f2f4f6",
                        "secondary-container": "#d0e1fb",
                        "surface-container": "#eceef0",
                        "error-container": "#ffdad6",
                        "on-surface-variant": "#3c4a42",
                        "outline-variant": "#bbcabf",
                        "surface": "#f7f9fb",
                        "primary-container": "#10b981",
                        "primary": "#006c49",
                        "on-primary-container": "#00422b",
                        "secondary": "#505f76",
                        "outline": "#6c7a71",
                    },
                    fontFamily: { "sans": ["Inter", "sans-serif"] },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
    </style>
</head>
<body class="flex min-h-screen text-on-surface">

<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-screen w-[280px] z-50 flex flex-col p-4 bg-surface-container-low border-r border-outline-variant">
    <div class="mb-8 px-2">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-primary no-underline">kosKita</a>
        <p class="text-xs text-secondary mt-0.5">Owner Portal</p>
    </div>
    <nav class="flex-1 space-y-1">
        <a class="flex items-center gap-4 px-4 py-2.5 bg-primary-container/10 text-primary rounded-lg font-semibold" href="{{ route('owner.dashboard') }}">
            <span class="material-symbols-outlined">home_work</span>
            <span class="text-sm">Manage Kos</span>
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
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ route('owner.dashboard') }}" class="text-secondary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="text-2xl font-semibold">Edit Kos</h2>
            </div>
            <p class="text-sm text-secondary ml-9">Ubah data kos "{{ $kos->nama_kos }}"</p>
        </div>
    </header>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <section class="bg-white rounded-xl border border-outline-variant p-8 shadow-sm mb-12">
        <form action="{{ route('owner.kos.update', $kos->id) }}" class="grid grid-cols-1 md:grid-cols-2 gap-8" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Kolom Kiri -->
            <div class="space-y-6">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="nama_kos">Nama Kos</label>
                    <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary text-base" id="nama_kos" name="nama_kos" type="text" value="{{ old('nama_kos', $kos->nama_kos) }}" required>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface">Tipe Kos</span>
                    <div class="flex gap-6 mt-1">
                        @foreach (['Putra', 'Putri', 'Campur'] as $tipe)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input class="text-primary focus:ring-primary" name="tipe_kos" type="radio" value="{{ $tipe }}" {{ old('tipe_kos', $kos->tipe_kos) == $tipe ? 'checked' : '' }}>
                                <span>{{ $tipe }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-medium text-on-surface" for="harga_per_bulan">Harga/Bulan (Rp)</label>
                        <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="harga_per_bulan" name="harga_per_bulan" type="number" value="{{ old('harga_per_bulan', $kos->harga_per_bulan) }}" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-medium text-on-surface" for="kota">Kota</label>
                        <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="kota" name="kota" type="text" value="{{ old('kota', $kos->kota) }}" required>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="alamat_lengkap">Alamat Lengkap</label>
                    <textarea class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="alamat_lengkap" name="alamat_lengkap" rows="2" required>{{ old('alamat_lengkap', $kos->alamat_lengkap) }}</textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="google_maps">Lokasi Google Maps (Embed Link)</label>
                    <input class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="google_maps" name="google_maps" type="text" value="{{ old('google_maps', $kos->google_maps) }}">
                    <p class="text-xs text-secondary mt-1">Bisa paste URL saja atau seluruh tag &lt;iframe&gt;</p>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="deskripsi">Deskripsi Kos</label>
                    <textarea class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kos->deskripsi) }}</textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-on-surface" for="peraturan">Peraturan Kos</label>
                    <textarea class="border-outline-variant rounded-lg p-2.5 focus:ring-primary focus:border-primary" id="peraturan" name="peraturan" rows="3">{{ old('peraturan', $kos->peraturan) }}</textarea>
                    <p class="text-xs text-secondary mt-1">Tulis satu peraturan per baris</p>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-6">
                <!-- Fasilitas Kamar -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface mb-1">Fasilitas Kamar</span>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach (['AC', 'Wifi', 'Kasur', 'Kamar Mandi Dalam', 'Kamar Mandi Luar'] as $fac)
                            <label class="flex items-center gap-2 p-2.5 rounded-lg border border-outline-variant hover:bg-surface-container transition-colors cursor-pointer">
                                <input class="text-primary rounded border-outline-variant focus:ring-primary" name="fasilitas[]" type="checkbox" value="{{ $fac }}"
                                    {{ in_array($fac, old('fasilitas', $fasilitasArray)) ? 'checked' : '' }}>
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
                                <input class="text-primary rounded border-outline-variant focus:ring-primary" name="fasilitas[]" type="checkbox" value="{{ $fac }}"
                                    {{ in_array($fac, old('fasilitas', $fasilitasArray)) ? 'checked' : '' }}>
                                <span class="text-sm">{{ $fac }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Foto Utama Saat Ini -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface">Foto Utama Saat Ini</span>
                    @if ($kos->foto_kos)
                        <img src="{{ $kos->foto_kos }}" alt="Foto kos saat ini" class="w-full h-40 object-cover rounded-lg border border-outline-variant mb-2">
                    @else
                        <div class="w-full h-40 bg-gray-100 rounded-lg flex items-center justify-center border border-outline-variant mb-2">
                            <span class="material-symbols-outlined text-gray-300 text-4xl">image</span>
                        </div>
                    @endif
                    <label class="text-xs text-secondary">Ganti foto utama (opsional)</label>
                    <input class="border-outline-variant rounded-lg p-2 text-sm" name="foto_kos" type="file" accept="image/*">
                </div>

                <!-- Foto Galeri -->
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-on-surface">Foto Galeri Saat Ini</span>
                    @if ($kos->foto_galeri && count($kos->foto_galeri) > 0)
                        <div class="grid grid-cols-3 gap-2 mb-2">
                            @foreach ($kos->foto_galeri as $foto)
                                <img src="{{ $foto }}" alt="Galeri" class="w-full h-20 object-cover rounded-lg border border-outline-variant">
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-gray-400 mb-2">Belum ada foto galeri</p>
                    @endif
                    <label class="text-xs text-secondary">Ganti foto galeri (opsional, maks 5 foto)</label>
                    <input class="border-outline-variant rounded-lg p-2 text-sm" name="foto_galeri[]" type="file" accept="image/*" multiple>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <button class="flex-1 bg-primary-container text-on-primary-container py-3 rounded-lg text-base font-semibold shadow-sm hover:opacity-90 active:scale-[0.98] transition-all" type="submit">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('owner.dashboard') }}" class="flex-1 text-center py-3 rounded-lg text-base font-semibold border border-outline-variant text-secondary hover:bg-surface-container transition-all no-underline">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </section>
</main>
</body>
</html>

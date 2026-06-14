// ===================================================================
//  KosFinder — Homepage JavaScript
//  Handles: search, filters, favorites, mobile menu, interactions
//  Algoritma: BRUTE FORCE untuk String Matching & Filtering
// ===================================================================

// ===== DOM Elements =====
const mobileMenuBtn = document.getElementById('btn-mobile-menu');
const mobileMenu = document.getElementById('mobile-menu');
const searchInput = document.getElementById('search-input');
const searchBtn = document.getElementById('btn-search');
const applyFilterBtn = document.getElementById('btn-apply-filter');
const propertyGrid = document.getElementById('property-grid');
const btnNavLogin = document.getElementById('btn-nav-login');
const btnNavRegister = document.getElementById('btn-nav-register');

// ===== Kos Data =====
const kosData = window.kosDataDB || [];

// ===== Mobile Menu Toggle =====
mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('open');
    const icon = mobileMenuBtn.querySelector('.material-symbols-outlined');
    icon.textContent = mobileMenu.classList.contains('open') ? 'close' : 'menu';
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
        mobileMenu.classList.remove('open');
        const icon = mobileMenuBtn.querySelector('.material-symbols-outlined');
        icon.textContent = 'menu';
    }
});

// ===================================================================
//  ALGORITMA BRUTE FORCE — STRING MATCHING
// ===================================================================
//
//  Brute Force String Matching adalah algoritma pencarian pola (pattern)
//  di dalam teks (text) dengan cara membandingkan karakter satu per satu
//  secara berurutan dari awal hingga akhir.
//
//  Cara Kerja:
//  1. Letakkan pattern di posisi awal teks (index 0)
//  2. Bandingkan karakter pattern[0] dengan text[0], pattern[1] dengan text[1], dst.
//  3. Jika semua karakter cocok → DITEMUKAN (return posisi)
//  4. Jika ada karakter yang tidak cocok → GESER pattern 1 posisi ke kanan
//  5. Ulangi langkah 2-4 sampai pattern ditemukan atau teks habis
//
//  Kompleksitas Waktu: O(n * m)
//    - n = panjang teks
//    - m = panjang pattern
//
//  Digunakan di:
//  - bruteForceSearch()    → mencari keyword di nama kos & lokasi
//  - bruteForceFilter()    → mencocokkan filter fasilitas & tipe kos
// ===================================================================

/**
 * BRUTE FORCE STRING MATCHING
 *
 * Mencari apakah 'pattern' ada di dalam 'text' menggunakan
 * algoritma Brute Force murni (tanpa .includes() bawaan JS).
 *
 * @param {string} text    - Teks yang dicari (misal: "Kost Exclusive Monjali")
 * @param {string} pattern - Pola yang dicari (misal: "monjali")
 * @returns {boolean} true jika pattern ditemukan di dalam text
 */
function bruteForceSearch(text, pattern) {
    // Konversi ke lowercase agar pencarian case-insensitive
    const t = text.toLowerCase();
    const p = pattern.toLowerCase();

    const n = t.length;   // Panjang teks
    const m = p.length;   // Panjang pattern

    // Jika pattern kosong, dianggap selalu cocok
    if (m === 0) return true;

    // Jika pattern lebih panjang dari teks, pasti tidak cocok
    if (m > n) return false;

    // === INTI ALGORITMA BRUTE FORCE ===
    // Geser pattern dari posisi 0 sampai posisi (n - m)
    for (let i = 0; i <= n - m; i++) {
        let j = 0; // Index untuk pattern

        // Bandingkan karakter per karakter
        while (j < m && t[i + j] === p[j]) {
            j++; // Karakter cocok, lanjut ke karakter berikutnya
        }

        // Jika semua karakter pattern cocok (j === m), berarti DITEMUKAN
        if (j === m) {
            return true; // Pattern ditemukan di posisi ke-i
        }

        // Jika tidak cocok, geser pattern 1 posisi ke kanan (i++)
        // dan mulai perbandingan ulang dari awal pattern
    }

    // Pattern tidak ditemukan di manapun dalam teks
    return false;
}

/**
 * BRUTE FORCE FILTERING
 *
 * Menyaring data kos dengan pendekatan Brute Force:
 * Iterasi SETIAP elemen data satu per satu, lalu cek SETIAP kriteria filter.
 *
 * Cara Kerja:
 * 1. Mulai dari data[0], cek apakah memenuhi SEMUA kriteria
 * 2. Jika ya → masukkan ke hasil
 * 3. Jika tidak → lewati
 * 4. Lanjut ke data[1], data[2], ... sampai data[n-1]
 *
 * Kompleksitas: O(n * k * m)
 *   - n = jumlah data kos
 *   - k = jumlah kriteria filter (tipe + fasilitas)
 *   - m = panjang string pencarian (untuk string matching)
 *
 * @param {Array}  data        - Seluruh data kos
 * @param {string} searchQuery - Keyword pencarian
 * @param {Array}  roomTypes   - Filter tipe kos ['putra', 'putri', 'campur']
 * @param {Array}  facilities  - Filter fasilitas ['ac', 'wifi', 'bed', ...]
 * @returns {Array} Data kos yang lolos semua filter
 */
function bruteForceFilter(data, searchQuery, roomTypes, facilities) {
    const result = []; // Array untuk menampung hasil filter

    // === BRUTE FORCE: Iterasi setiap data kos satu per satu ===
    for (let i = 0; i < data.length; i++) {
        const kos = data[i];
        let isMatch = true; // Asumsi awal: data ini cocok

        // --- KRITERIA 1: Pencarian Keyword (Brute Force String Matching) ---
        // Cek apakah keyword ada di nama kos ATAU di lokasi kos
        if (searchQuery.length > 0) {
            const matchNama   = bruteForceSearch(kos.name, searchQuery);
            const matchLokasi = bruteForceSearch(kos.location, searchQuery);

            if (!matchNama && !matchLokasi) {
                isMatch = false; // Keyword tidak ditemukan → tidak cocok
            }
        }

        // --- KRITERIA 2: Filter Tipe Kos (Brute Force Linear Search) ---
        // Cek apakah tipe kos ada di dalam daftar filter yang dipilih user
        if (isMatch && roomTypes.length > 0) {
            let typeFound = false;

            // Brute Force: bandingkan tipe kos dengan setiap pilihan filter
            for (let j = 0; j < roomTypes.length; j++) {
                if (kos.type === roomTypes[j]) {
                    typeFound = true;
                    break; // Ditemukan, tidak perlu cek lagi
                }
            }

            if (!typeFound) {
                isMatch = false; // Tipe kos tidak sesuai filter
            }
        }

        // --- KRITERIA 3: Filter Fasilitas (Brute Force — ALL must match) ---
        // Setiap fasilitas yang dipilih user HARUS dimiliki oleh kos ini
        if (isMatch && facilities.length > 0) {
            // Brute Force: cek setiap fasilitas yang diminta
            for (let f = 0; f < facilities.length; f++) {
                let facilityFound = false;

                // Brute Force: cari fasilitas ini di daftar fasilitas kos
                for (let k = 0; k < kos.facilities.length; k++) {
                    if (kos.facilities[k] === facilities[f]) {
                        facilityFound = true;
                        break; // Fasilitas ditemukan
                    }
                }

                if (!facilityFound) {
                    isMatch = false; // Salah satu fasilitas tidak ada
                    break;          // Tidak perlu cek fasilitas lainnya
                }
            }
        }

        // --- HASIL: Jika semua kriteria cocok, masukkan ke result ---
        if (isMatch) {
            result.push(kos);
        }
    }

    return result;
}

// ===== Card Renderer =====
function createCardHTML(kos) {
    const badgeClass = `badge-${kos.type}`;
    const badgeLabel = kos.type.charAt(0).toUpperCase() + kos.type.slice(1);
    const likedClass = kos.liked ? 'liked' : '';

    return `
        <article class="property-card" id="card-${kos.id}">
            <div class="card-image-wrapper">
                <img 
                    src="${kos.image}" 
                    alt="${kos.name} room interior" 
                    class="card-image"
                    loading="lazy"
                >
                <span class="card-badge ${badgeClass}">${badgeLabel}</span>
                <button class="btn-favorite ${likedClass}" data-id="${kos.id}" aria-label="Tambah ke favorit">
                    <span class="material-symbols-outlined">favorite</span>
                </button>
            </div>
            <div class="card-body">
                <h3 class="card-title">${kos.name}</h3>
                <p class="card-location">
                    <span class="material-symbols-outlined card-location-icon">location_on</span>
                    ${kos.location}
                </p>
                <div class="card-footer">
                    <div class="card-price-wrapper">
                        <span class="card-price">${kos.priceFormatted}</span>
                        <span class="card-price-period">/ bulan</span>
                    </div>
                </div>
                <button class="btn-view-detail" data-id="${kos.id}">Lihat Detail</button>
            </div>
        </article>
    `;
}

function renderCards(data) {
    if (data.length === 0) {
        propertyGrid.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px;">
                <span class="material-symbols-outlined" style="font-size: 48px; color: var(--outline); margin-bottom: 16px; display: block;">search_off</span>
                <h3 style="font-size: 20px; font-weight: 600; color: var(--on-surface); margin-bottom: 8px;">Kamar tidak ditemukan</h3>
                <p style="font-size: 14px; color: var(--secondary);">Coba sesuaikan filter atau kata kunci pencarianmu.</p>
            </div>
        `;
        return;
    }
    propertyGrid.innerHTML = data.map(createCardHTML).join('');
    attachCardListeners();
}

// ===== Event Listeners for Cards =====
function attachCardListeners() {
    // Favorite buttons
    document.querySelectorAll('.btn-favorite').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const id = parseInt(btn.dataset.id);
            const kos = kosData.find(k => k.id === id);
            if (kos) {
                kos.liked = !kos.liked;
                btn.classList.toggle('liked');
                // Pop animation
                btn.classList.add('pop');
                btn.addEventListener('animationend', () => {
                    btn.classList.remove('pop');
                }, { once: true });
            }
        });
    });

    // View detail buttons
    document.querySelectorAll('.btn-view-detail').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            window.location.href = `/kos/${id}`;
        });
    });
}

// ===== Filter Logic (Menggunakan Brute Force) =====
function getActiveFilters() {
    const roomTypes = [];
    document.querySelectorAll('input[name="room-type"]:checked').forEach(cb => {
        roomTypes.push(cb.value);
    });

    const facilities = [];
    document.querySelectorAll('input[name="facility"]:checked').forEach(cb => {
        facilities.push(cb.value);
    });

    return { roomTypes, facilities };
}

/**
 * Fungsi utama: Terapkan semua filter menggunakan algoritma Brute Force
 */
function applyFilters() {
    const { roomTypes, facilities } = getActiveFilters();
    const searchQuery = searchInput.value.trim().toLowerCase();

    // Panggil fungsi Brute Force Filter
    const filtered = bruteForceFilter(kosData, searchQuery, roomTypes, facilities);

    // Log untuk debugging / demonstrasi algoritma
    console.log('=== BRUTE FORCE FILTER ===');
    console.log('Keyword:', searchQuery || '(kosong)');
    console.log('Tipe Kos:', roomTypes.length > 0 ? roomTypes : '(semua)');
    console.log('Fasilitas:', facilities.length > 0 ? facilities : '(semua)');
    console.log('Total data:', kosData.length);
    console.log('Hasil filter:', filtered.length, 'kos ditemukan');
    console.log('==========================');

    renderCards(filtered);
}

// Apply filter button
applyFilterBtn.addEventListener('click', () => {
    applyFilters();

    // Visual feedback
    applyFilterBtn.textContent = '✓ Diterapkan!';
    applyFilterBtn.style.backgroundColor = 'var(--primary)';
    applyFilterBtn.style.color = 'var(--on-primary)';

    setTimeout(() => {
        applyFilterBtn.textContent = 'Terapkan Filter';
        applyFilterBtn.style.backgroundColor = '';
        applyFilterBtn.style.color = '';
    }, 1200);
});

// ===== Search (Menggunakan Brute Force String Matching) =====
searchBtn.addEventListener('click', () => {
    applyFilters();
});

searchInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        applyFilters();
    }
});

// ===== Login / Register Buttons =====
if (btnNavLogin && btnNavLogin.tagName === 'BUTTON') {
    btnNavLogin.addEventListener('click', () => {
        window.location.href = '/login';
    });
}

if (btnNavRegister && btnNavRegister.tagName === 'BUTTON') {
    btnNavRegister.addEventListener('click', () => {
        window.location.href = '/register';
    });
}

// ===== Navbar Scroll Effect =====
let lastScrollY = 0;
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    const currentScrollY = window.scrollY;

    if (currentScrollY > 50) {
        navbar.style.boxShadow = '0 2px 12px rgba(0, 0, 0, 0.08)';
    } else {
        navbar.style.boxShadow = 'none';
    }

    lastScrollY = currentScrollY;
});

// ===== Initial Render =====
renderCards(kosData);

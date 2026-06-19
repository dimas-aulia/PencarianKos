// ===================================================================
//  KosFinder — Homepage JavaScript
//  Handles: search, filters, favorites, mobile menu, interactions
//  Algoritma: KNUTH-MORRIS-PRATT (KMP) untuk String Matching & Filtering
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
//  ALGORITMA KNUTH-MORRIS-PRATT (KMP) — STRING MATCHING
// ===================================================================
//
//  KMP adalah algoritma pencarian pola (pattern) di dalam teks (text)
//  yang lebih efisien dibanding Brute Force karena memanfaatkan informasi
//  dari karakter yang sudah pernah dicocokkan sebelumnya.
//
//  KMP terdiri dari 2 tahap:
//
//  TAHAP 1 — PRE-PROCESSING (Membuat Tabel LPS):
//    LPS = Longest Proper Prefix which is also Suffix
//    Tabel ini menyimpan panjang prefix terpanjang dari pattern yang
//    juga merupakan suffix-nya, untuk setiap posisi di pattern.
//
//    Contoh: pattern = "ABCABD"
//    LPS = [0, 0, 0, 1, 2, 0]
//      - "A"      → tidak ada proper prefix = suffix → 0
//      - "AB"     → tidak ada proper prefix = suffix → 0
//      - "ABC"    → tidak ada proper prefix = suffix → 0
//      - "ABCA"   → "A" adalah prefix dan suffix     → 1
//      - "ABCAB"  → "AB" adalah prefix dan suffix    → 2
//      - "ABCABD" → tidak ada proper prefix = suffix → 0
//
//  TAHAP 2 — SEARCHING (Pencarian KMP):
//    1. Bandingkan karakter text[i] dengan pattern[j]
//    2. Jika cocok → maju keduanya (i++, j++)
//    3. Jika j === m (semua karakter pattern cocok) → DITEMUKAN
//    4. Jika tidak cocok (mismatch):
//       - Jika j > 0 → JANGAN reset j ke 0, tapi lompat ke LPS[j-1]
//         (inilah keunggulan KMP: tidak perlu mundur di teks)
//       - Jika j === 0 → maju i saja (i++)
//
//  Kompleksitas Waktu: O(n + m)
//    - n = panjang teks
//    - m = panjang pattern
//    - Jauh lebih efisien dari Brute Force O(n * m)
//
//  Digunakan di:
//  - computeLPSTable()  → pre-processing: membangun tabel LPS
//  - kmpSearch()        → mencari keyword di nama kos & lokasi
//  - kmpFilter()        → mencocokkan filter fasilitas & tipe kos
// ===================================================================

/**
 * PRE-PROCESSING KMP — MEMBUAT TABEL LPS
 *
 * LPS (Longest Proper Prefix which is also Suffix) table
 * digunakan untuk menentukan berapa karakter yang bisa di-skip
 * ketika terjadi mismatch saat pencarian.
 *
 * Cara Kerja:
 * 1. Inisialisasi LPS[0] = 0 (prefix pertama selalu 0)
 * 2. Gunakan dua pointer: `len` (panjang prefix match) dan `i` (posisi saat ini)
 * 3. Jika pattern[i] === pattern[len] → ada kecocokan, LPS[i] = len + 1
 * 4. Jika tidak cocok dan len > 0 → mundurkan len ke LPS[len - 1]
 * 5. Jika tidak cocok dan len === 0 → LPS[i] = 0, lanjut ke i berikutnya
 *
 * @param {string} pattern - Pola/kata kunci yang akan dicari
 * @returns {number[]} Array LPS dengan panjang sama dengan pattern
 *
 * Contoh:
 *   computeLPSTable("ABCABD") → [0, 0, 0, 1, 2, 0]
 *   computeLPSTable("AAAA")   → [0, 1, 2, 3]
 *   computeLPSTable("ABAB")   → [0, 0, 1, 2]
 */
function computeLPSTable(pattern) {
    const m = pattern.length;
    const lps = new Array(m).fill(0); // Inisialisasi tabel LPS dengan 0

    let len = 0; // Panjang prefix match sebelumnya
    let i = 1;   // Mulai dari index 1 (LPS[0] selalu 0)

    // === INTI PRE-PROCESSING KMP ===
    while (i < m) {
        if (pattern[i] === pattern[len]) {
            // Karakter cocok: prefix yang juga suffix bertambah panjang
            len++;
            lps[i] = len;
            i++;
        } else {
            // Karakter tidak cocok
            if (len !== 0) {
                // Jangan reset len ke 0, tapi mundur ke LPS[len - 1]
                // Ini memanfaatkan informasi prefix yang sudah diketahui
                len = lps[len - 1];
                // CATATAN: i TIDAK bertambah di sini, akan dicek ulang
            } else {
                // len sudah 0, tidak ada prefix yang cocok
                lps[i] = 0;
                i++;
            }
        }
    }

    return lps;
}

/**
 * KMP STRING MATCHING — PENCARIAN
 *
 * Mencari apakah 'pattern' ada di dalam 'text' menggunakan
 * algoritma Knuth-Morris-Pratt (KMP) yang memanfaatkan tabel LPS
 * agar tidak perlu mengulang perbandingan karakter yang sudah cocok.
 *
 * Keunggulan dibanding Brute Force:
 * - Brute Force: saat mismatch, geser pattern 1 posisi → O(n * m)
 * - KMP: saat mismatch, lompat sesuai tabel LPS → O(n + m)
 *
 * @param {string} text    - Teks yang dicari (misal: "Kost Exclusive Monjali")
 * @param {string} pattern - Pola yang dicari (misal: "monjali")
 * @returns {boolean} true jika pattern ditemukan di dalam text
 */
function kmpSearch(text, pattern) {
    // Konversi ke lowercase agar pencarian case-insensitive
    const t = text.toLowerCase();
    const p = pattern.toLowerCase();

    const n = t.length;   // Panjang teks
    const m = p.length;   // Panjang pattern

    // Jika pattern kosong, dianggap selalu cocok
    if (m === 0) return true;

    // Jika pattern lebih panjang dari teks, pasti tidak cocok
    if (m > n) return false;

    // TAHAP 1: Pre-processing — Bangun tabel LPS dari pattern
    const lps = computeLPSTable(p);

    // TAHAP 2: Searching — Cocokkan pattern ke teks menggunakan KMP
    let i = 0; // Index untuk teks (tidak pernah mundur!)
    let j = 0; // Index untuk pattern

    while (i < n) {
        // Karakter cocok: maju keduanya
        if (t[i] === p[j]) {
            i++;
            j++;
        }

        // Semua karakter pattern cocok → DITEMUKAN!
        if (j === m) {
            return true; // Pattern ditemukan di posisi (i - j)
        }

        // Karakter tidak cocok (mismatch)
        if (i < n && t[i] !== p[j]) {
            if (j !== 0) {
                // KEUNGGULAN KMP: Tidak perlu mundur di teks (i tetap)
                // Cukup lompat j ke posisi LPS[j-1]
                // Ini berarti kita skip karakter yang sudah diketahui cocok
                j = lps[j - 1];
            } else {
                // j sudah di awal pattern, maju i saja
                i++;
            }
        }
    }

    // Pattern tidak ditemukan di manapun dalam teks
    return false;
}

/**
 * KMP FILTERING
 *
 * Menyaring data kos dengan memanfaatkan algoritma KMP untuk pencarian string:
 * Iterasi SETIAP elemen data satu per satu, lalu cek SETIAP kriteria filter.
 * Untuk pencocokan keyword, digunakan KMP (bukan Brute Force) agar lebih efisien.
 *
 * Cara Kerja:
 * 1. Mulai dari data[0], cek apakah memenuhi SEMUA kriteria
 * 2. Jika ya → masukkan ke hasil
 * 3. Jika tidak → lewati
 * 4. Lanjut ke data[1], data[2], ... sampai data[n-1]
 *
 * Kompleksitas: O(n * (t + m))
 *   - n = jumlah data kos
 *   - t = panjang teks (nama/lokasi kos)
 *   - m = panjang pattern (keyword pencarian)
 *   - Lebih efisien dari Brute Force O(n * t * m) untuk string matching
 *
 * @param {Array}  data        - Seluruh data kos
 * @param {string} searchQuery - Keyword pencarian
 * @param {Array}  roomTypes   - Filter tipe kos ['putra', 'putri', 'campur']
 * @param {Array}  facilities  - Filter fasilitas ['ac', 'wifi', 'bed', ...]
 * @returns {Array} Data kos yang lolos semua filter
 */
function kmpFilter(data, searchQuery, roomTypes, facilities) {
    const result = []; // Array untuk menampung hasil filter

    // === ITERASI: Periksa setiap data kos satu per satu ===
    for (let i = 0; i < data.length; i++) {
        const kos = data[i];
        let isMatch = true; // Asumsi awal: data ini cocok

        // --- KRITERIA 1: Pencarian Keyword (KMP String Matching) ---
        // Cek apakah keyword ada di nama kos ATAU di lokasi kos
        // Menggunakan algoritma KMP yang lebih efisien O(n + m)
        if (searchQuery.length > 0) {
            const matchNama   = kmpSearch(kos.name, searchQuery);
            const matchLokasi = kmpSearch(kos.location, searchQuery);

            if (!matchNama && !matchLokasi) {
                isMatch = false; // Keyword tidak ditemukan → tidak cocok
            }
        }

        // --- KRITERIA 2: Filter Tipe Kos (Linear Search) ---
        // Cek apakah tipe kos ada di dalam daftar filter yang dipilih user
        if (isMatch && roomTypes.length > 0) {
            let typeFound = false;

            // Bandingkan tipe kos dengan setiap pilihan filter
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

        // --- KRITERIA 3: Filter Fasilitas (ALL must match) ---
        // Setiap fasilitas yang dipilih user HARUS dimiliki oleh kos ini
        if (isMatch && facilities.length > 0) {
            // Cek setiap fasilitas yang diminta
            for (let f = 0; f < facilities.length; f++) {
                let facilityFound = false;

                // Cari fasilitas ini di daftar fasilitas kos
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

// ===== Filter Logic (Menggunakan KMP String Matching) =====
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
 * Fungsi utama: Terapkan semua filter menggunakan algoritma KMP
 */
function applyFilters() {
    const { roomTypes, facilities } = getActiveFilters();
    const searchQuery = searchInput.value.trim().toLowerCase();

    // Panggil fungsi KMP Filter
    const filtered = kmpFilter(kosData, searchQuery, roomTypes, facilities);

    // Log untuk debugging / demonstrasi algoritma
    console.log('=== KMP FILTER ===');
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

// ===== Search (Menggunakan KMP String Matching) =====
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

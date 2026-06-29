
const mobileMenuBtn = document.getElementById('btn-mobile-menu');
const mobileMenu = document.getElementById('mobile-menu');
const searchInput = document.getElementById('search-input');
const searchBtn = document.getElementById('btn-search');
const applyFilterBtn = document.getElementById('btn-apply-filter');
const propertyGrid = document.getElementById('property-grid');
const btnNavLogin = document.getElementById('btn-nav-login');
const btnNavRegister = document.getElementById('btn-nav-register');

const kosData = window.kosDataDB || [];

mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('open');
    const icon = mobileMenuBtn.querySelector('.material-symbols-outlined');
    icon.textContent = mobileMenu.classList.contains('open') ? 'close' : 'menu';
});

document.addEventListener('click', (e) => {
    if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
        mobileMenu.classList.remove('open');
        const icon = mobileMenuBtn.querySelector('.material-symbols-outlined');
        icon.textContent = 'menu';
    }
});

function computeLPSTable(pattern) {
    const m = pattern.length;
    const lps = new Array(m).fill(0);

    let len = 0;
    let i = 1;

    while (i < m) {
        if (pattern[i] === pattern[len]) {
            len++;
            lps[i] = len;
            i++;
        } else {
            if (len !== 0) {
                len = lps[len - 1];
            } else {
                lps[i] = 0;
                i++;
            }
        }
    }

    return lps;
}

function kmpSearch(text, pattern) {
    const t = text.toLowerCase();
    const p = pattern.toLowerCase();

    const n = t.length;
    const m = p.length;

    if (m === 0) return true;
    if (m > n) return false;

    const lps = computeLPSTable(p);

    let i = 0;
    let j = 0;

    while (i < n) {
        if (t[i] === p[j]) {
            i++;
            j++;
        }

        if (j === m) {
            return true;
        }

        if (i < n && t[i] !== p[j]) {
            if (j !== 0) {
                j = lps[j - 1];
            } else {
                i++;
            }
        }
    }

    return false;
}

function kmpFilter(data, searchQuery, roomTypes, facilities) {
    const result = [];

    for (let i = 0; i < data.length; i++) {
        const kos = data[i];
        let isMatch = true;

        if (searchQuery.length > 0) {
            const matchNama = kmpSearch(kos.name, searchQuery);
            const matchLokasi = kmpSearch(kos.location, searchQuery);

            if (!matchNama && !matchLokasi) {
                isMatch = false;
            }
        }

        if (isMatch && roomTypes.length > 0) {
            let typeFound = false;

            for (let j = 0; j < roomTypes.length; j++) {
                if (kos.type === roomTypes[j]) {
                    typeFound = true;
                    break;
                }
            }

            if (!typeFound) {
                isMatch = false;
            }
        }

        if (isMatch && facilities.length > 0) {
            for (let f = 0; f < facilities.length; f++) {
                let facilityFound = false;

                for (let k = 0; k < kos.facilities.length; k++) {
                    if (kos.facilities[k] === facilities[f]) {
                        facilityFound = true;
                        break;
                    }
                }

                if (!facilityFound) {
                    isMatch = false;
                    break;
                }
            }
        }

        if (isMatch) {
            result.push(kos);
        }
    }

    return result;
}

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

function attachCardListeners() {
    document.querySelectorAll('.btn-favorite').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const id = parseInt(btn.dataset.id);
            const kos = kosData.find(k => k.id === id);
            if (kos) {
                kos.liked = !kos.liked;
                btn.classList.toggle('liked');
                btn.classList.add('pop');
                btn.addEventListener('animationend', () => {
                    btn.classList.remove('pop');
                }, { once: true });
            }
        });
    });

    document.querySelectorAll('.btn-view-detail').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            window.location.href = `/kos/${id}`;
        });
    });
}

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

function applyFilters() {
    const { roomTypes, facilities } = getActiveFilters();
    const searchQuery = searchInput.value.trim().toLowerCase();

    const filtered = kmpFilter(kosData, searchQuery, roomTypes, facilities);

    console.log('=== KMP FILTER ===');
    console.log('Keyword:', searchQuery || '(kosong)');
    console.log('Tipe Kos:', roomTypes.length > 0 ? roomTypes : '(semua)');
    console.log('Fasilitas:', facilities.length > 0 ? facilities : '(semua)');
    console.log('Total data:', kosData.length);
    console.log('Hasil filter:', filtered.length, 'kos ditemukan');
    console.log('==========================');

    renderCards(filtered);
}

applyFilterBtn.addEventListener('click', () => {
    applyFilters();

    applyFilterBtn.textContent = '✓ Diterapkan!';
    applyFilterBtn.style.backgroundColor = 'var(--primary)';
    applyFilterBtn.style.color = 'var(--on-primary)';

    setTimeout(() => {
        applyFilterBtn.textContent = 'Terapkan Filter';
        applyFilterBtn.style.backgroundColor = '';
        applyFilterBtn.style.color = '';
    }, 1200);
});

searchBtn.addEventListener('click', () => {
    applyFilters();
});

searchInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        applyFilters();
    }
});

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

renderCards(kosData);

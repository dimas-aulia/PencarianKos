// ===================================================================
//  KosFinder — Homepage JavaScript
//  Handles: search, filters, favorites, mobile menu, interactions
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
const kosData = [
    {
        id: 1,
        name: 'Kost Exclusive Monjali',
        location: 'Sleman, Yogyakarta',
        price: 1200000,
        priceFormatted: 'Rp 1.200.000',
        type: 'putri',
        facilities: ['ac', 'wifi', 'bathroom', 'bed'],
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
        liked: false
    },
    {
        id: 2,
        name: 'Kost Premium Seturan',
        location: 'Depok, Sleman',
        price: 1500000,
        priceFormatted: 'Rp 1.500.000',
        type: 'putra',
        facilities: ['ac', 'wifi', 'bathroom'],
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
        liked: false
    },
    {
        id: 3,
        name: 'Kost Minimalis Gejayan',
        location: 'Gejayan, Yogyakarta',
        price: 1100000,
        priceFormatted: 'Rp 1.100.000',
        type: 'campur',
        facilities: ['wifi', 'bed'],
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
        liked: false
    },
    {
        id: 4,
        name: 'Kost Nyaman Condongcatur',
        location: 'Condongcatur, Sleman',
        price: 950000,
        priceFormatted: 'Rp 950.000',
        type: 'putri',
        facilities: ['ac', 'wifi'],
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
        liked: false
    },
    {
        id: 5,
        name: 'Kost Modern Babarsari',
        location: 'Babarsari, Sleman',
        price: 1350000,
        priceFormatted: 'Rp 1.350.000',
        type: 'putra',
        facilities: ['ac', 'wifi', 'bathroom', 'bed'],
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
        liked: false
    },
    {
        id: 6,
        name: 'Kost Strategis Jakal',
        location: 'Jl. Kaliurang, Sleman',
        price: 800000,
        priceFormatted: 'Rp 800.000',
        type: 'campur',
        facilities: ['wifi'],
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
        liked: false
    }
];

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
                <button class="btn-favorite ${likedClass}" data-id="${kos.id}" aria-label="Add to favorites">
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
                        <span class="card-price-period">/ month</span>
                    </div>
                </div>
                <button class="btn-view-detail" data-id="${kos.id}">View Detail</button>
            </div>
        </article>
    `;
}

function renderCards(data) {
    if (data.length === 0) {
        propertyGrid.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px;">
                <span class="material-symbols-outlined" style="font-size: 48px; color: var(--outline); margin-bottom: 16px; display: block;">search_off</span>
                <h3 style="font-size: 20px; font-weight: 600; color: var(--on-surface); margin-bottom: 8px;">No rooms found</h3>
                <p style="font-size: 14px; color: var(--secondary);">Try adjusting your filters or search query.</p>
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
            const kos = kosData.find(k => k.id === parseInt(id));
            if (kos) {
                alert(`Detail for: ${kos.name}\n\nLocation: ${kos.location}\nPrice: ${kos.priceFormatted}/month\nType: ${kos.type}\nFacilities: ${kos.facilities.join(', ')}\n\n(Detail page coming soon!)`);
            }
        });
    });
}

// ===== Filter Logic =====
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

    let filtered = kosData;

    // Filter by search query (location)
    if (searchQuery) {
        filtered = filtered.filter(kos =>
            kos.location.toLowerCase().includes(searchQuery) ||
            kos.name.toLowerCase().includes(searchQuery)
        );
    }

    // Filter by room type
    if (roomTypes.length > 0) {
        filtered = filtered.filter(kos => roomTypes.includes(kos.type));
    }

    // Filter by facilities (must have ALL selected)
    if (facilities.length > 0) {
        filtered = filtered.filter(kos =>
            facilities.every(fac => kos.facilities.includes(fac))
        );
    }

    renderCards(filtered);
}

// Apply filter button
applyFilterBtn.addEventListener('click', () => {
    applyFilters();

    // Visual feedback
    applyFilterBtn.textContent = '✓ Applied!';
    applyFilterBtn.style.backgroundColor = 'var(--primary)';
    applyFilterBtn.style.color = 'var(--on-primary)';

    setTimeout(() => {
        applyFilterBtn.textContent = 'Apply Filters';
        applyFilterBtn.style.backgroundColor = '';
        applyFilterBtn.style.color = '';
    }, 1200);
});

// ===== Search =====
searchBtn.addEventListener('click', () => {
    applyFilters();
});

searchInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        applyFilters();
    }
});

// ===== Login / Register Buttons =====
btnNavLogin.addEventListener('click', () => {
    window.location.href = 'index.html';
});

btnNavRegister.addEventListener('click', () => {
    window.location.href = 'index.html';
});

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

// ===== DOM Elements =====
const loginForm = document.getElementById('login-form');
const loginCard = document.getElementById('login-card');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const emailGroup = document.getElementById('email-group');
const passwordGroup = document.getElementById('password-group');
const emailError = document.getElementById('email-error');
const passwordError = document.getElementById('password-error');
const togglePasswordBtn = document.getElementById('toggle-password');
const btnLogin = document.getElementById('btn-login');

// ===== Toggle Password Visibility =====
togglePasswordBtn.addEventListener('click', () => {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';

    const eyeOpen = togglePasswordBtn.querySelector('.eye-open');
    const eyeClosed = togglePasswordBtn.querySelector('.eye-closed');

    eyeOpen.style.display = isPassword ? 'none' : 'block';
    eyeClosed.style.display = isPassword ? 'block' : 'none';
});

// ===== Validation Helpers =====
function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showError(group, errorEl, message) {
    group.classList.add('error');
    errorEl.textContent = message;
}

function clearError(group, errorEl) {
    group.classList.remove('error');
    errorEl.textContent = '';
}

// ===== Real-time Validation =====
emailInput.addEventListener('input', () => {
    if (emailGroup.classList.contains('error')) {
        if (isValidEmail(emailInput.value.trim())) {
            clearError(emailGroup, emailError);
        }
    }
});

passwordInput.addEventListener('input', () => {
    if (passwordGroup.classList.contains('error')) {
        if (passwordInput.value.length >= 6) {
            clearError(passwordGroup, passwordError);
        }
    }
});

// ===== Form Submission =====
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Clear previous errors
    clearError(emailGroup, emailError);
    clearError(passwordGroup, passwordError);

    const email = emailInput.value.trim();
    const password = passwordInput.value;
    let hasError = false;

    // Validate email
    if (!email) {
        showError(emailGroup, emailError, 'Email wajib diisi');
        hasError = true;
    } else if (!isValidEmail(email)) {
        showError(emailGroup, emailError, 'Format email tidak valid');
        hasError = true;
    }

    // Validate password
    if (!password) {
        showError(passwordGroup, passwordError, 'Password wajib diisi');
        hasError = true;
    } else if (password.length < 6) {
        showError(passwordGroup, passwordError, 'Password minimal 6 karakter');
        hasError = true;
    }

    if (hasError) {
        // Shake animation
        loginCard.classList.add('shake');
        loginCard.addEventListener('animationend', () => {
            loginCard.classList.remove('shake');
        }, { once: true });
        return;
    }

    // Simulate login
    btnLogin.classList.add('loading');
    btnLogin.disabled = true;

    // Simulate API call delay
    await new Promise(resolve => setTimeout(resolve, 1800));

    btnLogin.classList.remove('loading');
    btnLogin.disabled = false;

    // Success feedback
    loginCard.classList.add('success');
    loginCard.addEventListener('animationend', () => {
        loginCard.classList.remove('success');
    }, { once: true });

    // Show success message (replace button text briefly)
    const btnText = btnLogin.querySelector('.btn-text');
    btnText.textContent = '✓ Berhasil!';
    btnLogin.style.background = 'linear-gradient(135deg, #10B981, #059669)';

    setTimeout(() => {
        btnText.textContent = 'Masuk';
        btnLogin.style.background = '';
        alert('Login berhasil! (Demo — belum terhubung ke backend)');
    }, 1500);
});

// ===== Keyboard Accessibility =====
document.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && document.activeElement === passwordInput) {
        loginForm.dispatchEvent(new Event('submit', { cancelable: true }));
    }
});

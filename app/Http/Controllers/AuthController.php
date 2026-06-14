<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Proses pendaftaran user baru.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:pencari,pemilik',
            'whatsapp' => 'nullable|string|max:20',
        ], [
            'name.required'      => 'Nama lengkap wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Kata sandi wajib diisi.',
            'password.min'       => 'Kata sandi minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'role.required'      => 'Pilih peran Anda.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'whatsapp' => $request->whatsapp,
        ]);

        Auth::login($user);

        $redirectTo = match($user->role) {
            'admin' => '/admin/dashboard',
            'pemilik' => '/owner/dashboard',
            default => '/',
        };
        return redirect($redirectTo)->with('success', 'Pendaftaran berhasil! Selamat datang, ' . $user->name);
    }

    /**
     * Tampilkan halaman login.
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $defaultUrl = match($user->role) {
                'admin' => '/admin/dashboard',
                'pemilik' => '/owner/dashboard',
                default => '/',
            };
            return redirect()->intended($defaultUrl)->with('success', 'Login berhasil! Selamat datang kembali, ' . $user->name);
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    /**
     * Proses logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil keluar.');
    }
}

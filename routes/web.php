<?php

use Illuminate\Support\Facades\Route;

// Mengatur agar saat mengakses http://127.0.0.1:8000 langsung membuka halaman utama Anda
Route::get('/', function () {
    return view('home'); // Memanggil resources/views/welcome.blade.php
});
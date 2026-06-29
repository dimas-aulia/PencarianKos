<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Kos::create([
            'nama_kos' => 'Kost DIMAS',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 1200000,
            'kota' => 'Sleman, Yogyakarta',
            'alamat_lengkap' => 'Jl. Monjali No.12, Sinduadi, Mlati, Sleman',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1!2d110.3647!3d-7.7686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDYnMDcuMCJTIDExMMKwMjEnNTMuMCJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Dapur,Parkir Motor',
            'deskripsi' => 'Kost eksklusif dengan desain modern di kawasan strategis Monjali, Sleman. Dekat dengan berbagai fasilitas umum, kampus UGM & UNY, dan pusat perbelanjaan. Kamar sudah full furnish dengan kualitas premium untuk kenyamanan maksimal penghuni. Lingkungan tenang dan aman dengan penjagaan 24 jam. Parkir luas untuk mobil dan motor.',
            'peraturan' => "Maksimal tamu berkunjung hingga jam 22.00\nDilarang membawa hewan peliharaan\nWajib menjaga kebersihan kamar dan area bersama\nDilarang merokok di dalam kamar\nPembayaran sewa dilakukan setiap tanggal 1",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            ],
            'no_wa_pemilik' => '6283824827163',
            'nama_pemilik' => 'Pak Dimas Aulia',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Premium Seturan',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 1500000,
            'kota' => 'Depok, Sleman',
            'alamat_lengkap' => 'Jl. Seturan Raya No.88, Caturtunggal, Depok, Sleman',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.3!2d110.4023!3d-7.7541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDUnMTQuOCJTIDExMMKwMjQnMDguMyJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Parkir Motor,Parkir Mobil',
            'deskripsi' => 'Kost premium di jantung Seturan, hanya 5 menit dari kampus UPN Veteran dan Atma Jaya. Akses mudah ke pusat kuliner Seturan dan minimarket. Setiap kamar dilengkapi AC, WiFi high-speed, dan kamar mandi dalam. Tersedia laundry, dapur bersama, dan CCTV 24 jam untuk keamanan penghuni.',
            'peraturan' => "Jam bertamu maksimal pukul 21.00\nDilarang membuat keributan setelah jam 22.00\nWajib lapor jika membawa kendaraan\nPembayaran di muka setiap awal bulan\nDilarang menginap tanpa izin pemilik",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            ],
            'no_wa_pemilik' => '6281234567891',
            'nama_pemilik' => 'Bu Ratna Sari',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Minimalis Gejayan',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 1100000,
            'kota' => 'Gejayan, Yogyakarta',
            'alamat_lengkap' => 'Jl. Gejayan, Mrican, Caturtunggal, Sleman',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2!2d110.3912!3d-7.7623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDUnNDQuMyJTIDExMMKwMjMnMjguMyJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Luar,Dapur,Parkir Motor',
            'deskripsi' => 'Kost minimalis dengan harga terjangkau di kawasan strategis Gejayan. Cocok untuk mahasiswa UGM, UNY, dan Sanata Dharma. Lokasi dekat dengan area kuliner, minimarket, dan transportasi umum. Tersedia WiFi cepat dan kasur nyaman di setiap kamar. Suasana kos yang bersih dan nyaman.',
            'peraturan' => "Jam malam pukul 23.00\nTamu lawan jenis dilarang masuk kamar\nWajib menjaga ketenangan lingkungan\nSampah dibuang pada tempatnya\nDilarang memasak di dalam kamar",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            ],
            'no_wa_pemilik' => '6281234567892',
            'nama_pemilik' => 'Mas Adi Pratama',
            'status' => 'Approved',
        ]);

        // ===== 17 Data Kos Tambahan =====

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Putri Mawar Indah',
            'tipe_kos' => 'Putri',
            'harga_per_bulan' => 900000,
            'kota' => 'Yogyakarta',
            'alamat_lengkap' => 'Jl. Kaliurang Km.5 No.15, Caturtunggal, Depok, Sleman',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2!2d110.3812!3d-7.7523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Dalam,Dapur,Parkir Motor',
            'deskripsi' => 'Kost putri yang bersih dan nyaman di kawasan Kaliurang. Dekat kampus UGM dan UNY. Lingkungan aman dan tenang, cocok untuk mahasiswi yang ingin fokus belajar. Penjaga kos 24 jam dan pintu gerbang selalu terkunci setelah jam 22.00.',
            'peraturan' => "Khusus putri\nJam malam pukul 22.00\nTamu lawan jenis hanya di ruang tamu\nDilarang membawa hewan peliharaan\nWajib menjaga kebersihan bersama",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            ],
            'no_wa_pemilik' => '6281345678901',
            'nama_pemilik' => 'Ibu Sri Wahyuni',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Eksekutif Jakarta Selatan',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 3000000,
            'kota' => 'Jakarta Selatan',
            'alamat_lengkap' => 'Jl. Mampang Prapatan Raya No.45, Mampang, Jakarta Selatan',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2!2d106.8292!3d-6.2487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Dapur,Parkir Motor,Parkir Mobil',
            'deskripsi' => 'Kost eksekutif dengan fasilitas lengkap di pusat Jakarta Selatan. Sangat dekat dengan stasiun MRT Blok A dan halte TransJakarta. Cocok untuk karyawan dan profesional muda. Setiap kamar fully furnished dengan AC, water heater, dan smart TV. Area rooftop untuk bersantai tersedia.',
            'peraturan' => "Tamu maksimal jam 22.00\nDilarang merokok di dalam gedung\nParkir sesuai slot masing-masing\nKeamanan 24 jam dengan CCTV\nPembayaran via transfer setiap tanggal 5",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            ],
            'no_wa_pemilik' => '6281456789012',
            'nama_pemilik' => 'Pak Hendra Wijaya',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Bandung Residence',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 1350000,
            'kota' => 'Bandung',
            'alamat_lengkap' => 'Jl. Dipatiukur No.72, Lebak Gede, Coblong, Bandung',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1!2d107.6171!3d-6.8932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Parkir Motor',
            'deskripsi' => 'Kost putra strategis di kawasan Dipatiukur, Bandung. Hanya 5 menit berjalan kaki ke kampus ITB dan UNPAD. Udara sejuk khas Bandung membuat penghuni nyaman. Akses mudah ke factory outlet dan pusat kuliner Bandung. WiFi high-speed dan listrik token tersedia di setiap kamar.',
            'peraturan' => "Jam bertamu sampai pukul 21.30\nDilarang membawa minuman beralkohol\nWajib menjaga kebersihan\nPembayaran sewa setiap tanggal 1-5\nDilarang merokok di area umum",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            ],
            'no_wa_pemilik' => '6281567890123',
            'nama_pemilik' => 'Pak Asep Suryadi',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Surabaya Timur',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 850000,
            'kota' => 'Surabaya',
            'alamat_lengkap' => 'Jl. Keputih Tegal Timur No.30, Keputih, Sukolilo, Surabaya',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8!2d112.7905!3d-7.2908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Luar,Parkir Motor',
            'deskripsi' => 'Kost putra murah dan strategis dekat ITS Surabaya. Hanya 3 menit ke gerbang kampus ITS. Cocok untuk mahasiswa yang mencari kos terjangkau. Tersedia WiFi, listrik termasuk, dan area parkir motor. Lingkungan kos bersih dan teratur.',
            'peraturan' => "Tidak boleh berisik setelah jam 22.00\nDilarang merokok di kamar\nWajib kunci pintu depan setelah jam 23.00\nBayar listrik sesuai pemakaian\nKebersihan kamar tanggung jawab pribadi",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            ],
            'no_wa_pemilik' => '6281678901234',
            'nama_pemilik' => 'Pak Bambang Hermawan',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Putri Malang Asri',
            'tipe_kos' => 'Putri',
            'harga_per_bulan' => 750000,
            'kota' => 'Malang',
            'alamat_lengkap' => 'Jl. Sumbersari Gang 4 No.10, Lowokwaru, Malang',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.6!2d112.6133!3d-7.9566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Dalam,Dapur,Parkir Motor',
            'deskripsi' => 'Kost putri asri dan sejuk di kawasan Sumbersari, Malang. Dekat kampus Universitas Brawijaya. Suasana tenang dan hijau, sangat cocok untuk belajar. Setiap kamar dilengkapi kasur, lemari, dan meja belajar. Dapur bersama tersedia untuk penghuni.',
            'peraturan' => "Khusus putri\nJam malam pukul 21.30\nDilarang bawa tamu menginap\nJaga kebersihan dapur bersama\nPembayaran maksimal tanggal 10",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            ],
            'no_wa_pemilik' => '6281789012345',
            'nama_pemilik' => 'Bu Endang Lestari',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Solo Grand',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 1000000,
            'kota' => 'Solo',
            'alamat_lengkap' => 'Jl. Adi Sucipto No.55, Jajar, Laweyan, Solo',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4!2d110.7947!3d-7.5591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kasur,Kamar Mandi Dalam,Parkir Motor',
            'deskripsi' => 'Kost campur di kawasan Solo Barat. Lokasi strategis di jalur utama Adi Sucipto, dekat Bandara Adi Sumarmo dan UNS. Kamar luas dan bersih dengan fasilitas lengkap. Cocok untuk mahasiswa maupun pekerja. Area kos tenang dengan taman kecil.',
            'peraturan' => "Tamu wajib lapor ke penjaga\nJam malam pukul 23.00\nDilarang membawa hewan\nListrik menggunakan token\nBuang sampah pada tempatnya",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            ],
            'no_wa_pemilik' => '6281890123456',
            'nama_pemilik' => 'Pak Joko Susilo',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Semarang Hill View',
            'tipe_kos' => 'Putri',
            'harga_per_bulan' => 1100000,
            'kota' => 'Semarang',
            'alamat_lengkap' => 'Jl. Ngesrep Timur V No.8, Tembalang, Semarang',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9!2d110.4385!3d-7.0497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Dalam,Dapur,Parkir Motor',
            'deskripsi' => 'Kost putri nyaman di kawasan Tembalang dengan pemandangan bukit. Dekat kampus UNDIP Tembalang. Udara sejuk dan pemandangan hijau dari setiap kamar. Tersedia WiFi cepat, dapur bersama, dan jemuran tertutup. Keamanan terjaga dengan pagar tinggi.',
            'peraturan' => "Khusus putri\nJam malam pukul 22.00\nTamu lawan jenis di ruang tamu saja\nDilarang membuang sampah sembarangan\nGunakan air secukupnya",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            ],
            'no_wa_pemilik' => '6281901234567',
            'nama_pemilik' => 'Bu Dewi Hartono',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Depok UI Residence',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 1800000,
            'kota' => 'Depok',
            'alamat_lengkap' => 'Jl. Margonda Raya No.120, Pondok Cina, Beji, Depok',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1!2d106.8324!3d-6.3674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Dapur,Parkir Motor',
            'deskripsi' => 'Kost modern di jalur Margonda, Depok. Sangat dekat dengan Universitas Indonesia dan stasiun KRL Pondok Cina. Akses mudah ke Jakarta via kereta. Kamar ber-AC dengan kamar mandi dalam. Tersedia ruang bersama, dapur, dan area laundry. Cocok untuk mahasiswa UI dan pekerja commuter.',
            'peraturan' => "Tamu maksimal jam 21.00\nWajib scan barcode masuk\nDilarang memasak dengan kompor gas\nParkir motor di area yang ditentukan\nBiaya listrik terpisah",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            ],
            'no_wa_pemilik' => '6282012345678',
            'nama_pemilik' => 'Pak Rizky Fadhillah',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Tangerang Selatan Modern',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 2200000,
            'kota' => 'Tangerang Selatan',
            'alamat_lengkap' => 'Jl. BSD Raya Utama No.33, Serpong, Tangerang Selatan',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5!2d106.6682!3d-6.3014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Parkir Motor,Parkir Mobil',
            'deskripsi' => 'Kost modern di kawasan BSD, Tangerang Selatan. Dekat dengan AEON Mall, The Breeze, dan ICE BSD. Cocok untuk pekerja di area Serpong dan sekitarnya. Desain interior modern dan minimalis. Setiap kamar memiliki AC, kamar mandi dalam dengan water heater, dan akses WiFi fiber optic.',
            'peraturan' => "Tamu wajib melapor\nDilarang merokok di gedung\nParkir sesuai area yang ditentukan\nPembayaran setiap tanggal 1\nJaga ketenangan setelah jam 22.00",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            ],
            'no_wa_pemilik' => '6282123456789',
            'nama_pemilik' => 'Pak Fajar Nugroho',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Bekasi Green Living',
            'tipe_kos' => 'Putri',
            'harga_per_bulan' => 1250000,
            'kota' => 'Bekasi',
            'alamat_lengkap' => 'Jl. Ahmad Yani No.67, Bekasi Selatan, Bekasi',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3!2d106.9895!3d-6.2401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kasur,Kamar Mandi Dalam,Parkir Motor',
            'deskripsi' => 'Kost putri dengan konsep green living di Bekasi Selatan. Taman hijau di sekeliling bangunan memberikan suasana asri. Dekat stasiun KRL Bekasi untuk commuter ke Jakarta. Setiap kamar ber-AC dengan ventilasi baik. Tersedia mushola dan ruang belajar bersama.',
            'peraturan' => "Khusus putri\nJam malam pukul 22.00\nDilarang menempel poster di dinding\nHemat penggunaan air dan listrik\nBayar sewa sebelum tanggal 5",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            ],
            'no_wa_pemilik' => '6282234567890',
            'nama_pemilik' => 'Bu Ningsih Rahayu',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Jogja Condongcatur Elite',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 1400000,
            'kota' => 'Sleman, Yogyakarta',
            'alamat_lengkap' => 'Jl. Ring Road Utara No.22, Condongcatur, Depok, Sleman',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.4!2d110.3976!3d-7.7501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Dapur,Parkir Motor',
            'deskripsi' => 'Kost putra elite di kawasan Condongcatur, Sleman. Lokasi strategis di Ring Road Utara, dekat UPN Veteran, Atma Jaya, dan berbagai pusat perbelanjaan. Bangunan baru dengan desain industrial modern. Kamar luas ukuran 4x4 meter dengan fasilitas premium.',
            'peraturan' => "Jam bertamu sampai 21.00\nDilarang mengubah instalasi listrik\nWajib melapor jika membawa tamu menginap\nDilarang membuang sampah di saluran air\nBayar tepat waktu setiap tanggal 1",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            ],
            'no_wa_pemilik' => '6282345678901',
            'nama_pemilik' => 'Pak Wahyu Prasetyo',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Jakarta Kost Pusat',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 2500000,
            'kota' => 'Jakarta Pusat',
            'alamat_lengkap' => 'Jl. Salemba Raya No.16, Paseban, Senen, Jakarta Pusat',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4!2d106.8545!3d-6.1928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Dapur,Parkir Motor',
            'deskripsi' => 'Kost premium di kawasan Salemba, Jakarta Pusat. Dekat UI Salemba, Universitas YAI, dan RS Cipto Mangunkusumo. Akses transportasi publik sangat mudah dengan busway dan KRL. Kamar fully furnished dengan AC dan WiFi fiber optic. Lokasi strategis untuk pekerja dan mahasiswa.',
            'peraturan' => "Tamu wajib registrasi di resepsionis\nDilarang membuat keributan\nArea parkir terbatas, utamakan motor\nListrik menggunakan token prepaid\nKebersihan area bersama dijaga bersama",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            ],
            'no_wa_pemilik' => '6282456789012',
            'nama_pemilik' => 'Bu Megawati Suharto',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Bandung Dago Pakar',
            'tipe_kos' => 'Putri',
            'harga_per_bulan' => 1600000,
            'kota' => 'Bandung',
            'alamat_lengkap' => 'Jl. Ir. H. Djuanda No.100, Dago, Coblong, Bandung',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2!2d107.6189!3d-6.8854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'AC,Wifi,Kamar Mandi Dalam,Kasur,Dapur,Parkir Motor',
            'deskripsi' => 'Kost putri eksklusif di kawasan Dago, Bandung. Lingkungan asri dengan udara pegunungan yang sejuk. Dekat ITB, UNPAR, dan area wisata Dago Pakar. Bangunan bergaya kolonial yang terawat. Setiap kamar memiliki balkon kecil dengan pemandangan kota Bandung.',
            'peraturan' => "Khusus putri\nJam malam pukul 22.30\nDilarang menggunakan kompor di kamar\nTamu lawan jenis hanya di lantai 1\nPembayaran via transfer setiap tanggal 1",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            ],
            'no_wa_pemilik' => '6282567890123',
            'nama_pemilik' => 'Bu Citra Permata',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Surabaya Barat Harmoni',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 950000,
            'kota' => 'Surabaya',
            'alamat_lengkap' => 'Jl. HR. Muhammad No.88, Pradahkalikendal, Dukuhpakis, Surabaya',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7!2d112.7123!3d-7.2945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Dalam,Dapur,Parkir Motor',
            'deskripsi' => 'Kost campur strategis di Surabaya Barat. Dekat dengan Pakuwon Mall dan Citraland. Akses mudah ke berbagai pusat bisnis Surabaya. Kamar bersih dan terawat dengan ventilasi baik. WiFi kencang tersedia 24 jam. Cocok untuk pekerja dan mahasiswa UNESA.',
            'peraturan' => "Tamu maksimal pukul 22.00\nDilarang merokok di kamar\nJaga kebersihan area bersama\nPembayaran sewa per 3 bulan\nDilarang menambah colokan listrik sendiri",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
            ],
            'no_wa_pemilik' => '6282678901234',
            'nama_pemilik' => 'Pak Agus Setiawan',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Jogja Prawirotaman',
            'tipe_kos' => 'Campur',
            'harga_per_bulan' => 800000,
            'kota' => 'Yogyakarta',
            'alamat_lengkap' => 'Jl. Prawirotaman No.18, Brontokusuman, Mergangsan, Yogyakarta',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.8!2d110.3655!3d-7.8107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Luar,Parkir Motor',
            'deskripsi' => 'Kost campur di kawasan wisata Prawirotaman, Yogyakarta. Suasana artistik dengan banyak cafe dan galeri seni di sekitar. Dekat Kraton Yogyakarta dan Malioboro. Cocok untuk freelancer, seniman, dan mahasiswa ISI. Harga terjangkau dengan atmosfer yang unik.',
            'peraturan' => "Bebas jam malam\nDilarang membawa hewan peliharaan\nJaga ketenangan setelah jam 23.00\nSampah organik dan non-organik terpisah\nBayar sewa setiap awal bulan",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            ],
            'no_wa_pemilik' => '6282789012345',
            'nama_pemilik' => 'Mas Rangga Kusuma',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Malang Kota Lama',
            'tipe_kos' => 'Putra',
            'harga_per_bulan' => 650000,
            'kota' => 'Malang',
            'alamat_lengkap' => 'Jl. Ijen No.34, Oro-oro Dowo, Klojen, Malang',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7!2d112.6287!3d-7.9711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Luar,Parkir Motor',
            'deskripsi' => 'Kost putra murah meriah di kawasan Ijen Boulevard, Malang. Bangunan heritage dengan nuansa tempo dulu yang unik. Dekat alun-alun Malang dan pusat kota. Cocok untuk mahasiswa yang mencari kos dengan budget terbatas. WiFi tersedia dan listrik termasuk dalam biaya sewa.',
            'peraturan' => "Jam malam pukul 23.00\nDilarang merokok di dalam kamar\nWajib menjaga ketertiban\nBayar sewa tepat waktu\nDilarang merusak fasilitas",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlshSp7qpl4lttzmLJ3cT-WHdv7VeGUuexQC1E0eQ9l6ve7OZz9fuSX-oaek2nYLT12FByPorJXmoiLueeKKRwYsqAw8I2h9EmhvuJLvx4gRGfoTdpOCBW8iekGhTe6sB3OnwIp5AJOwdcxa95fkg_1z9CpzOC1aXS7bCPA3v70FxU80PY9Nv6TfW6cpoCJVZECWO7_B87EASSU9CyGCQqaRVAKxDxLgETdSrhJWK3BKNSb9WwTxo4I0fU4ITu7cfsEoEGRxtVEQp5',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuC1wKRZGeOmb9QaaTYy5n8mAR5STS6QtMKy1eCuqqG7J8QCTVrMQTZ2x71cDx70nqPaDOLYtrNec_s4Q0PwZh4FWoO-RXItjDHtOuYVn9HAMJLRy03P-5zXpP6t_-bAlYqMKpUCrgPmZz03XYNEHcNTfOU1LEkTDgVGpoGUbk7vwbYF1lPYtd_N02M7pAMtLGA2PvlnruQ3gM3bvQ1aa4K3HU5Ix2nmCryZbGJQE_2Ynb6UYjj3ycdIWXEvP0sYrEOedTMeendPhSRb',
            ],
            'no_wa_pemilik' => '6282890123456',
            'nama_pemilik' => 'Pak Gunawan Hidayat',
            'status' => 'Approved',
        ]);

        \App\Models\Kos::create([
            'nama_kos' => 'Kost Solo Laweyan Heritage',
            'tipe_kos' => 'Putri',
            'harga_per_bulan' => 700000,
            'kota' => 'Solo',
            'alamat_lengkap' => 'Jl. Dr. Rajiman No.77, Laweyan, Solo',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.5!2d110.7834!3d-7.5724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
            'fasilitas' => 'Wifi,Kasur,Kamar Mandi Dalam,Dapur,Parkir Motor',
            'deskripsi' => 'Kost putri di kawasan heritage Laweyan, Solo. Suasana tradisional Jawa yang kental dengan bangunan khas kampung batik. Dekat Pasar Klewer dan Keraton Solo. Cocok untuk mahasiswi UNS dan ISI Solo. Harga sangat terjangkau dengan fasilitas yang memadai.',
            'peraturan' => "Khusus putri\nJam malam pukul 21.00\nDilarang membawa tamu laki-laki ke kamar\nWajib ikut kerja bakti bulanan\nBayar sewa maksimal tanggal 5",
            'foto_kos' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCb0MJf5sZKpnIBfe3pLLHyL7daJXVJ9NVGnaL9hDfjuNzHALMmGML2WIkTzOeXnCPqkC6fb-xvEVT-P2nhuzbmutuNtfXl2RoJ8UdsMKDwb24nXmUWFgCB77qtk99ivS3aB3bPIML6zwESEymcLwHk1CS-ndRyw0RG9bBe3wO4nUZO1aFA_-CDzsXq4mnYXx5237St3VEBNxyMS1HhiCyp89F_z6yZJ4eUAc3A-ORatA8oKcBTIQZWdTPLqamxpbZ-kERcqiv3Xve1',
            'foto_galeri' => [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAu9mCnVIpGace6RwYE_dBVrIlsdtoUnk0HrBUHBR8v0a5livA6rGllmb1ViQdwQYS9KNqr0y32fzpcc5UyibRb7XFb_ABQ34nzC2I7cIw_oY6faovmBDjzr-kdD4N66FjgzjRuyxNIRYKBmhkzvRJ5JcWq7rDtzRsNK58KLK154VvYFFSji3yuMRfyy1SN0VOLjVeJCmGXQmm4a4WgwonWoEjJHZNAwq67pgRhxFhObM6S6XvquUiRTO5BT12iPlve4u-R1IBiv1Gl',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg0UnYjhkEEHTZpLiafSAt175lM7eY4Ohk85JL-w0-SY24_4eLpp1VBrUPMvgErh9udWRqrP4j1tRTKt4PwTqyokHbxSLzEc8xM5Cjghe1anaoPjIFodgIvT5IcTV3cVwCtoIOPbLgqstCXfy2S_uX_fyM8i0FIm6MTZ8e5gapgSBZtZLh_O7EpwUPvbjyHISI5Gih7JG-qOvPwOlmY_6BdEXw5xH6zbDpv7YoEVbFjMm5aJLu4mrfPMMETHUJVrWhCrioGevPBEER',
            ],
            'no_wa_pemilik' => '6282901234567',
            'nama_pemilik' => 'Bu Hartini Wibowo',
            'status' => 'Approved',
        ]);
    }
}

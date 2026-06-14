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
    }
}

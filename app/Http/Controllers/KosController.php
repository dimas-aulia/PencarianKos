<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class KosController extends Controller
{
    /**
     * Tampilkan halaman utama (home) dengan data kos dari DB.
     */
    public function index()
    {
        $allKos = Kos::where('status', 'Approved')->get();

        // Format data agar sesuai dengan struktur yang diharapkan oleh JavaScript di frontend (home.js)
        $kosData = $allKos->map(function ($kos) {
            // Map facility names from DB to filter-friendly keys
            $facilityMap = [
                'ac' => 'ac',
                'wifi' => 'wifi',
                'kamar mandi dalam' => 'bathroom',
                'kamar mandi luar' => 'bathroom_outside',
                'kasur' => 'bed',
                'dapur' => 'kitchen',
                'parkir motor' => 'parking_motorcycle',
                'parkir mobil' => 'parking_car',
            ];

            $rawFacilities = explode(',', $kos->fasilitas);
            $mappedFacilities = array_map(function ($fac) use ($facilityMap) {
                $key = strtolower(trim($fac));
                return $facilityMap[$key] ?? $key;
            }, $rawFacilities);

            return [
                'id' => $kos->id,
                'name' => $kos->nama_kos,
                'location' => $kos->kota,
                'price' => $kos->harga_per_bulan,
                'priceFormatted' => 'Rp ' . number_format($kos->harga_per_bulan, 0, ',', '.'),
                'type' => strtolower($kos->tipe_kos), // 'putra', 'putri', 'campur'
                'facilities' => array_values($mappedFacilities),
                'image' => $kos->foto_kos,
                'liked' => false,
            ];
        });

        return view('home', compact('kosData'));
    }

    /**
     * Tampilkan halaman detail kos.
     */
    public function show($id)
    {
        $kosModel = Kos::findOrFail($id);

        // Ambil galeri foto dari database, atau fallback ke array kosong
        $galeri = $kosModel->foto_galeri ?? [];

        // Mapping dari database ke array yang diharapkan oleh view
        $kos = [
            'id' => $kosModel->id,
            'name' => $kosModel->nama_kos,
            'location' => $kosModel->kota,
            'address' => $kosModel->alamat_lengkap,
            'priceFormatted' => 'Rp ' . number_format($kosModel->harga_per_bulan, 0, ',', '.'),
            'type' => $kosModel->tipe_kos,
            'facilities' => explode(',', $kosModel->fasilitas),
            'image' => $kosModel->foto_kos,
            'gallery' => $galeri,
            'description' => $kosModel->deskripsi ?? 'Kost di ' . $kosModel->alamat_lengkap,
            'peraturan' => $kosModel->peraturan,
            'google_maps' => $kosModel->google_maps,
            'owner' => $kosModel->nama_pemilik ?? 'Pemilik Kos',
            'whatsapp' => $kosModel->no_wa_pemilik,
        ];

        return view('detail', compact('kos'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    /**
     * Tampilkan dashboard pemilik kos.
     */
    public function index()
    {
        $user = Auth::user();
        $kosList = Kos::where('user_id', $user->id)->latest()->get();

        return view('owner.dashboard', compact('user', 'kosList'));
    }

    /**
     * Simpan kos baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kos'       => 'required|string|max:255',
            'tipe_kos'       => 'required|in:Putra,Putri,Campur',
            'harga_per_bulan' => 'required|numeric|min:0',
            'kota'           => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'google_maps'    => 'nullable|string',
            'deskripsi'      => 'nullable|string',
            'peraturan'      => 'nullable|string',
            'fasilitas'      => 'nullable|array',
            'foto_kos'       => 'nullable|image|max:5120',
            'foto_galeri'    => 'nullable|array|max:5',
            'foto_galeri.*'  => 'image|max:5120',
        ]);

        $user = Auth::user();

        // Upload foto utama
        $fotoKosPath = null;
        if ($request->hasFile('foto_kos')) {
            $fotoKosPath = $request->file('foto_kos')->store('kos', 'public');
            $fotoKosPath = '/storage/' . $fotoKosPath;
        }

        // Upload foto galeri
        $fotoGaleri = [];
        if ($request->hasFile('foto_galeri')) {
            foreach ($request->file('foto_galeri') as $file) {
                $path = $file->store('kos/galeri', 'public');
                $fotoGaleri[] = '/storage/' . $path;
            }
        }

        // Gabungkan fasilitas menjadi string comma-separated
        $fasilitas = '';
        if ($request->has('fasilitas')) {
            $fasilitas = implode(',', $request->fasilitas);
        }

        // Ekstrak URL src dari tag iframe jika user paste seluruh tag <iframe>
        $googleMaps = $request->google_maps;
        if ($googleMaps && preg_match('/src=["\']([^"\']+)["\']/', $googleMaps, $matches)) {
            $googleMaps = $matches[1];
        }

        Kos::create([
            'user_id'         => $user->id,
            'nama_kos'        => $request->nama_kos,
            'tipe_kos'        => $request->tipe_kos,
            'harga_per_bulan' => $request->harga_per_bulan,
            'kota'            => $request->kota,
            'alamat_lengkap'  => $request->alamat_lengkap,
            'google_maps'     => $googleMaps,
            'fasilitas'       => $fasilitas,
            'deskripsi'       => $request->deskripsi,
            'peraturan'       => $request->peraturan,
            'foto_kos'        => $fotoKosPath,
            'foto_galeri'     => $fotoGaleri,
            'no_wa_pemilik'   => $user->whatsapp,
            'nama_pemilik'    => $user->name,
            'status'          => 'Pending',
        ]);

        return redirect()->route('owner.dashboard')->with('success', 'Kos berhasil ditambahkan! Menunggu persetujuan admin.');
    }

    /**
     * Hapus kos milik user.
     */
    public function destroy($id)
    {
        $kos = Kos::where('id', $id)
                   ->where('user_id', Auth::id())
                   ->firstOrFail();

        $kos->delete();

        return redirect()->route('owner.dashboard')->with('success', 'Kos berhasil dihapus.');
    }

    /**
     * Tampilkan form edit kos.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $kos = Kos::where('id', $id)
                   ->where('user_id', $user->id)
                   ->firstOrFail();

        // Pecah fasilitas menjadi array untuk checkbox
        $fasilitasArray = array_map('trim', explode(',', $kos->fasilitas));

        return view('owner.edit', compact('user', 'kos', 'fasilitasArray'));
    }

    /**
     * Update data kos.
     */
    public function update(Request $request, $id)
    {
        $kos = Kos::where('id', $id)
                   ->where('user_id', Auth::id())
                   ->firstOrFail();

        $request->validate([
            'nama_kos'       => 'required|string|max:255',
            'tipe_kos'       => 'required|in:Putra,Putri,Campur',
            'harga_per_bulan' => 'required|numeric|min:0',
            'kota'           => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'google_maps'    => 'nullable|string',
            'deskripsi'      => 'nullable|string',
            'peraturan'      => 'nullable|string',
            'fasilitas'      => 'nullable|array',
            'foto_kos'       => 'nullable|image|max:5120',
            'foto_galeri'    => 'nullable|array|max:5',
            'foto_galeri.*'  => 'image|max:5120',
        ]);

        // Upload foto utama baru (jika ada)
        if ($request->hasFile('foto_kos')) {
            $fotoKosPath = $request->file('foto_kos')->store('kos', 'public');
            $kos->foto_kos = '/storage/' . $fotoKosPath;
        }

        // Upload foto galeri baru (jika ada — mengganti galeri lama)
        if ($request->hasFile('foto_galeri')) {
            $fotoGaleri = [];
            foreach ($request->file('foto_galeri') as $file) {
                $path = $file->store('kos/galeri', 'public');
                $fotoGaleri[] = '/storage/' . $path;
            }
            $kos->foto_galeri = $fotoGaleri;
        }

        // Gabungkan fasilitas
        $fasilitas = '';
        if ($request->has('fasilitas')) {
            $fasilitas = implode(',', $request->fasilitas);
        }

        // Ekstrak URL src dari tag iframe
        $googleMaps = $request->google_maps;
        if ($googleMaps && preg_match('/src=["\']([^"\']+)["\']/', $googleMaps, $matches)) {
            $googleMaps = $matches[1];
        }

        $kos->update([
            'nama_kos'        => $request->nama_kos,
            'tipe_kos'        => $request->tipe_kos,
            'harga_per_bulan' => $request->harga_per_bulan,
            'kota'            => $request->kota,
            'alamat_lengkap'  => $request->alamat_lengkap,
            'google_maps'     => $googleMaps,
            'fasilitas'       => $fasilitas,
            'deskripsi'       => $request->deskripsi,
            'peraturan'       => $request->peraturan,
        ]);

        return redirect()->route('owner.dashboard')->with('success', 'Kos "' . $kos->nama_kos . '" berhasil diperbarui!');
    }
}

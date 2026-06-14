<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Dashboard admin: statistik + daftar kos pending.
     */
    public function index()
    {
        $pendingKos = Kos::where('status', 'Pending')->latest()->get();
        $approvedCount = Kos::where('status', 'Approved')->count();
        $pendingCount = $pendingKos->count();
        $ownerCount = User::where('role', 'pemilik')->count();

        return view('admin.dashboard', compact(
            'pendingKos',
            'approvedCount',
            'pendingCount',
            'ownerCount'
        ));
    }

    /**
     * Setujui kos (ubah status ke Approved).
     */
    public function approve($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->update(['status' => 'Approved']);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Kos "' . $kos->nama_kos . '" berhasil disetujui dan sekarang tampil di halaman utama.');
    }

    /**
     * Tolak kos (ubah status ke Rejected).
     */
    public function reject($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->update(['status' => 'Rejected']);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Kos "' . $kos->nama_kos . '" telah ditolak.');
    }
}

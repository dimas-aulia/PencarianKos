<?php

namespace App\Models;
//mantap kale

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//firdi
//hafid
class Kos extends Model
{
    protected $table = 'kos';
    protected $fillable = [
        'user_id',
        'nama_kos',
        'tipe_kos',
        'harga_per_bulan',
        'kota',
        'alamat_lengkap',
        'google_maps',
        'fasilitas',
        'deskripsi',
        'peraturan',
        'foto_kos',
        'foto_galeri',
        'no_wa_pemilik',
        'nama_pemilik',
        'status',
    ];

    protected $casts = [
        'foto_galeri' => 'array',
    ];

    /**
     * Relasi ke User (pemilik kos).
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

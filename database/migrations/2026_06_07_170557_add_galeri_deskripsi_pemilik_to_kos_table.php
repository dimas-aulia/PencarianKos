<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->json('foto_galeri')->nullable()->after('foto_kos');       // Array of photo URLs
            $table->text('deskripsi')->nullable()->after('fasilitas');         // Deskripsi lengkap kos
            $table->string('nama_pemilik')->nullable()->after('no_wa_pemilik'); // Nama pemilik kos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->dropColumn(['foto_galeri', 'deskripsi', 'nama_pemilik']);
        });
    }
};

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
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kos');
            $table->enum('tipe_kos', ['Putra', 'Putri', 'Campur']);
            $table->integer('harga_per_bulan');
            $table->string('kota');
            $table->text('alamat_lengkap');
            $table->string('fasilitas'); // Disimpan sebagai string, misal: 'AC,Wifi,Kasur'
            $table->text('foto_kos')->nullable();
            $table->string('no_wa_pemilik')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};

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
            $table->text('google_maps')->nullable()->after('alamat_lengkap');
            $table->text('peraturan')->nullable()->after('deskripsi');
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['google_maps', 'peraturan', 'user_id']);
        });
    }
};

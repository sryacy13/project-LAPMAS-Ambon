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
        Schema::table('pengaduans', function (Blueprint $table) {
            if (!Schema::hasColumn('pengaduans', 'status')) {
                $table->enum('status', [
                    'Belum diproses',
                    'Sedang diproses',
                    'Selesai',
                    'Pengaduan Dibatalkan'
                ])->default('Belum diproses')->after('gambar');
            }

            if (!Schema::hasColumn('pengaduans', 'tanggapan')) {
                $table->text('tanggapan')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduans', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('pengaduans', 'tanggapan')) {
                $table->dropColumn('tanggapan');
            }
        });
    }
};

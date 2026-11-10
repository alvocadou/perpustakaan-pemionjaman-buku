
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('peminjaman')) {
            Schema::table('peminjaman', function (Blueprint $table) {
                if (!Schema::hasColumn('peminjaman', 'kode_peminjaman')) {
                    $table->string('kode_peminjaman')->nullable()->unique();
                }

                if (!Schema::hasColumn('peminjaman', 'tanggal_pengembalian')) {
                    $table->date('tanggal_pengembalian')->nullable();
                }
            });

            return;
        }

        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman')->unique();
            $table->foreignId('anggota_id')->constrained('anggota')->cascadeOnDelete();
            $table->foreignId('buku_id')->constrained('buku')->cascadeOnDelete();
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('status')->default('dipinjam');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Tidak menghapus tabel lama agar data tetap aman.
    }
};

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
        Schema::create('siswa', function (Blueprint $table) {
            $table->uuid('siswa_id')->primary();
            $table->text('siswa_kode')->nullable();
            $table->text('siswa_nama')->nullable();
            $table->text('siswa_alamat')->nullable();
            $table->text('siswa_jenis_kelamin')->nullable();
            $table->text('siswa_kelas')->nullable();
            $table->text('siswa_tanggal_lahir')->nullable();
            $table->text('siswa_tempat_lahir')->nullable();
            $table->text('siswa_asal_sekolah')->nullable();
            $table->text('siswa_notlp')->nullable();
            $table->text('siswa_instagram')->nullable();
            $table->text('siswa_jurusan')->nullable();
            $table->text('siswa_rangking')->nullable();
            $table->text('siswa_raport')->nullable();
            $table->text('siswa_ayah')->nullable();
            $table->text('siswa_ibu')->nullable();
            $table->text('siswa_alamat_ortu')->nullable();
            $table->text('siswa_ortu_notlp')->nullable();
            $table->text('siswa_semester_awal_id')->nullable();
            $table->text('siswa_foto')->nullable();
            $table->text('email')->nullable();
            $table->text('siswa_metode_bayar')->nullable();
            $table->text('password')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->text('siswa_paket_les_id')->nullable();
            $table->integer('siswa_status_bayar')->default(0);
            $table->integer('siswa_status_aktif')->default(1);
            $table->text('bukti_bayar_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};

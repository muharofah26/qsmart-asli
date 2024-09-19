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
        Schema::create('pengajar', function (Blueprint $table) {
            $table->uuid('pengajar_id')->primary();
            $table->text('pengajar_nama')->nullable();
            $table->text('pengajar_tanggal_lahir')->nullable();
            $table->text('pengajar_pendidikan_akhir')->nullable();
            $table->text('pengajar_kampus')->nullable();
            $table->text('pengajar_foto')->nullable();
            $table->text('pengajar_notlp')->nullable();
            $table->text('pengajar_alamat')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajar');
    }
};

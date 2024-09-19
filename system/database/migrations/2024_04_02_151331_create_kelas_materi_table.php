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
        Schema::create('kelas_materi', function (Blueprint $table) {
            $table->uuid('kelas_materi_id')->primary();
            $table->text('kelas_id')->nullable(); //id kelas
            $table->text('kelas_nomor')->nullable(); //id guru pengajar
            $table->text('pengajar_id')->nullable(); //id guru pengajar
            $table->text('materi_nama')->nullable(); //id kelas
            $table->text('materi_icon')->nullable(); //id kelas
            $table->integer('flag_erase')->default(1); //id kelas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_materi');
    }
};

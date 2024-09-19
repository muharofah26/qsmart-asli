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
        Schema::create('pengaturan_pembelajaran', function (Blueprint $table) {
            $table->id('pengaturan_id');
            $table->text('semester_nama')->nullable(); //genap atau ganjil
            $table->text('semester_kode')->nullable(); //tahun+1
            $table->integer('flag_erase')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_pembelajaran');
    }
};

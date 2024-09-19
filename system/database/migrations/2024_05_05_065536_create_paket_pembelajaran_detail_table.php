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
        Schema::create('paket_pembelajaran_detail', function (Blueprint $table) {
            $table->uuid('paket_detail_id')->primary();
            $table->text('paket_id')->nullable();
            $table->text('paket_kelas')->nullable();
            $table->text('paket_biaya_daftar')->nullable();
            $table->text('paket_spp_bulan')->nullable();
            $table->text('paket_spp_semester')->nullable();
            $table->text('paket_spp_tahun')->nullable();
            $table->integer('flag_erase')->default(1);        

        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_pembelajaran_detail');
    }
};

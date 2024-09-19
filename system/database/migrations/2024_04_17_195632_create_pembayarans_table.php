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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->uuid('pembayaran_id')->primary();
            $table->text('pembayaran_nama')->nullable();
            $table->text('pembayaran_nomor')->nullable();
            $table->text('pembayaran_penerima')->nullable();
            $table->text('pembayaran_status')->default(1);
            $table->text('pembayaran_icon')->nullable();
            $table->text('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

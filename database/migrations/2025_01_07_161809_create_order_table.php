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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order'); // Primary key, auto-increment
            $table->unsignedBigInteger('id_jasa'); // Foreign key untuk jasa
            $table->unsignedBigInteger('id_user'); // Foreign key untuk user
            $table->string('nama_user', 40);
            $table->string('email', 30);
            $table->string('phone', 20);
            $table->string('deskripsi_order', 900);
            $table->string('metode_pembayaran', 15);
            $table->string('status_pembayaran')->default('pending');
            $table->string('status_order')->default('pengajuan');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};

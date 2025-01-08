<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->string('nama'); // Kolom untuk nama freelancer
            $table->string('email')->unique(); // Kolom untuk email, harus unik
            $table->date('tanggal_lahir'); // Kolom untuk tanggal lahir
            $table->string('gender'); // Kolom untuk gender
            $table->string('alamat'); // Kolom untuk alamat
            $table->string('kota'); // Kolom untuk kota
            $table->integer('kode_pos'); // Kolom untuk kode pos
            $table->string('skill'); // Kolom untuk skill
            $table->string('telepon'); // Kolom untuk nomor telepon
            $table->string('foto_ktp'); // Kolom untuk path foto KTP
            $table->string('status')->default('pengajuan'); // Kolom untuk status dengan default 'pengajuan'
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancers');
    }
}

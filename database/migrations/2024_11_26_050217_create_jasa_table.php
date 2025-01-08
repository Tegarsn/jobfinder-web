<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaTable extends Migration
{
    public function up()
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengguna yang mengupload jasa
            $table->string('nama_jasa');
            $table->string('kategori_jasa');
            $table->string('sub_kategorijasa');
            $table->integer('harga_jasa');
            $table->text('deskripsi_jasa');
            $table->string('gambar_jasa'); // Path file gambar jasa
            $table->timestamps();

            // Foreign key untuk relasi dengan tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jasa');
    }
}

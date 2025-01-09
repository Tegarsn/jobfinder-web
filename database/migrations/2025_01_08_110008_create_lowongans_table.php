<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowongansTable extends Migration
{
    public function up()
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lowongan');
            $table->string('perusahaan');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->string('posisi');
            $table->decimal('gaji', 15, 2);
            $table->string('kota');
            $table->string('alamat');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lowongans');
    }
}

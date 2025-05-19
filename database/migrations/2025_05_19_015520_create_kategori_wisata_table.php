<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriWisataTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_wisata');
    }
}

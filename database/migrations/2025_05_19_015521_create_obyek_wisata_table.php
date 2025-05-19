<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObyekWisataTable extends Migration
{
    public function up()
    {
        Schema::create('obyek_wisata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_wisata_id')->constrained('kategori_wisata')->onDelete('cascade');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('obyek_wisata');
    }
}

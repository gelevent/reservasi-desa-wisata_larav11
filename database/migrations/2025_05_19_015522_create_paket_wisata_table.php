<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketWisataTable extends Migration
{
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obyek_wisata_id')->constrained('obyek_wisata')->onDelete('cascade');
            $table->string('nama_paket');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_wisata');
    }
}

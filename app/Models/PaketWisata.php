<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $table = 'paket_wisata';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'kategori_wisata_id',
    ];

    public function kategoriWisata()
    {
        return $this->belongsTo(KategoriWisata::class);
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}

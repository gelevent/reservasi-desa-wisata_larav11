<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObyekWisata extends Model
{
    use HasFactory;

    protected $table = 'obyek_wisata';

    protected $fillable = [
        'nama',
        'kategori_wisata_id',
        'lokasi',
        'deskripsi',
    ];

    public function kategoriWisata()
    {
        return $this->belongsTo(KategoriWisata::class);
    }
}

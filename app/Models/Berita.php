<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'kategori_berita_id',
        'tanggal',
    ];

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class);
    }
}

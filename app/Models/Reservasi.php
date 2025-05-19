<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'pelanggan_id',
        'paket_wisata_id',
        'tanggal_reservasi',
        'jumlah_pengunjung',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}

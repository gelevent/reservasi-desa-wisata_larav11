<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\PaketWisata;
use App\Models\Reservasi;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalPaket = PaketWisata::count();
        $totalReservasi = Reservasi::count();
        $totalPelanggan = Pelanggan::count();

        return view('admin.dashboard', compact('totalBerita', 'totalPaket', 'totalReservasi', 'totalPelanggan'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ObyekWisata;
use App\Models\PaketWisata;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data terbaru dan limit untuk homepage
        $obyekWisata = ObyekWisata::latest()->take(3)->get();
        $paketWisata = PaketWisata::latest()->take(3)->get();
        $berita = Berita::latest()->take(3)->get();

        return view('home', compact('obyekWisata', 'paketWisata', 'berita'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategoriBerita')->get();
        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategoriBeritas = KategoriBerita::all();
        return view('berita.create', compact('kategoriBeritas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'tanggal' => 'required|date',
        ]);

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function edit(Berita $berita)
    {
        $kategoriBeritas = KategoriBerita::all();
        return view('berita.edit', compact('berita', 'kategoriBeritas'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'tanggal' => 'required|date',
        ]);

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

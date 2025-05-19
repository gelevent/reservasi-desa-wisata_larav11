<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $data = KategoriBerita::all();
        return view('kategori-berita.index', compact('data'));
    }

    public function create()
    {
        return view('kategori-berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        KategoriBerita::create($request->all());
        return redirect()->route('kategori-berita.index')->with('success', 'Kategori Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        return view('kategori-berita.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KategoriBerita::destroy($id);
        return redirect()->route('kategori-berita.index')->with('success', 'Kategori Berita berhasil dihapus.');
    }
}

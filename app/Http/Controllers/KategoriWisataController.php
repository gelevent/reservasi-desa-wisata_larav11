<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;

class KategoriWisataController extends Controller
{
    public function index()
    {
        $data = KategoriWisata::all();
        return view('kategori-wisata.index', compact('data'));
    }

    public function create()
    {
        return view('kategori-wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        KategoriWisata::create($request->all());
        return redirect()->route('kategori-wisata.index')->with('success', 'Kategori Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriWisata::findOrFail($id);
        return view('kategori-wisata.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriWisata::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori-wisata.index')->with('success', 'Kategori Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KategoriWisata::destroy($id);
        return redirect()->route('kategori-wisata.index')->with('success', 'Kategori Wisata berhasil dihapus.');
    }
}

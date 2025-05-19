<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriWisata;

class KategoriWisataController extends Controller
{
    public function index()
    {
        $data = KategoriWisata::all();
        return view('admin.kategori-wisata.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori-wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        KategoriWisata::create($request->all());
        return redirect()->route('admin.kategori-wisata.index')->with('success', 'Kategori Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriWisata::findOrFail($id);
        return view('admin.kategori-wisata.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriWisata::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('admin.kategori-wisata.index')->with('success', 'Kategori Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KategoriWisata::destroy($id);
        return redirect()->route('admin.kategori-wisata.index')->with('success', 'Kategori Wisata berhasil dihapus.');
    }
}

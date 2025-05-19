<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        $paketWisatas = PaketWisata::with('kategoriWisata')->get();
        return view('admin.paket.index', compact('paketWisatas'));
    }

    public function create()
    {
        $kategoriWisatas = KategoriWisata::all();
        return view('admin.paket.create', compact('kategoriWisatas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori_wisata_id' => 'required|exists:kategori_wisata,id',
        ]);

        PaketWisata::create($validated);

        return redirect()->route('paketwisata.index')->with('success', 'Paket Wisata berhasil dibuat.');
    }

    public function edit(PaketWisata $paketwisata)
    {
        $kategoriWisatas = KategoriWisata::all();
        return view('admin.paket.edit', compact('paketwisata', 'kategoriWisatas'));
    }

    public function update(Request $request, PaketWisata $paketwisata)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori_wisata_id' => 'required|exists:kategori_wisata,id',
        ]);

        $paketwisata->update($validated);

        return redirect()->route('paketwisata.index')->with('success', 'Paket Wisata berhasil diperbarui.');
    }

    public function destroy(PaketWisata $paketwisata)
    {
        $paketwisata->delete();
        return redirect()->route('paketwisata.index')->with('success', 'Paket Wisata berhasil dihapus.');
    }
}

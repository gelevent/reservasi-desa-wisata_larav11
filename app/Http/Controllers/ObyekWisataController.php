<?php

namespace App\Http\Controllers;

use App\Models\ObyekWisata;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class ObyekWisataController extends Controller
{
    public function index()
    {
        $obyekWisatas = ObyekWisata::with('kategoriWisata')->get();
        return view('obyekwisata.index', compact('obyekWisatas'));
    }

    public function create()
    {
        $kategoriWisatas = KategoriWisata::all();
        return view('obyekwisata.create', compact('kategoriWisatas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_wisata_id' => 'required|exists:kategori_wisata,id',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        ObyekWisata::create($validated);

        return redirect()->route('obyekwisata.index')->with('success', 'Obyek Wisata berhasil dibuat.');
    }

    public function edit(ObyekWisata $obyekwisata)
    {
        $kategoriWisatas = KategoriWisata::all();
        return view('obyekwisata.edit', compact('obyekwisata', 'kategoriWisatas'));
    }

    public function update(Request $request, ObyekWisata $obyekwisata)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_wisata_id' => 'required|exists:kategori_wisata,id',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $obyekwisata->update($validated);

        return redirect()->route('obyekwisata.index')->with('success', 'Obyek Wisata berhasil diperbarui.');
    }

    public function destroy(ObyekWisata $obyekwisata)
    {
        $obyekwisata->delete();
        return redirect()->route('obyekwisata.index')->with('success', 'Obyek Wisata berhasil dihapus.');
    }
}

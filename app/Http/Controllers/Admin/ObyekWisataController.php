<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObyekWisata;

class ObyekWisataController extends Controller
{
    public function index()
    {
        $data = ObyekWisata::all();
        return view('admin.obyek-wisata.index', compact('data'));
    }

    public function create()
    {
        return view('admin.obyek-wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_wisata_id' => 'required|exists:kategori_wisata,id',
            'deskripsi' => 'nullable|string'
        ]);

        ObyekWisata::create($request->all());
        return redirect()->route('admin.obyek-wisata.index')->with('success', 'Obyek Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $obyek = ObyekWisata::findOrFail($id);
        return view('admin.obyek-wisata.edit', compact('obyek'));
    }

    public function update(Request $request, $id)
    {
        $obyek = ObyekWisata::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_wisata_id' => 'required|exists:kategori_wisata,id',
            'deskripsi' => 'nullable|string'
        ]);
        $obyek->update($request->all());

        return redirect()->route('admin.obyek-wisata.index')->with('success', 'Obyek Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        ObyekWisata::destroy($id);
        return redirect()->route('admin.obyek-wisata.index')->with('success', 'Obyek Wisata berhasil dihapus.');
    }
}

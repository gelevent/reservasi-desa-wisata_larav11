<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketWisata;

class PaketWisataController extends Controller
{
    public function index()
    {
        $data = PaketWisata::all();
        return view('admin.paket-wisata.index', compact('data'));
    }

    public function create()
    {
        return view('admin.paket-wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string'
        ]);

        PaketWisata::create($request->all());
        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('admin.paket-wisata.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketWisata::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string'
        ]);
        $paket->update($request->all());

        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket Wisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PaketWisata::destroy($id);
        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket Wisata berhasil dihapus.');
    }
}

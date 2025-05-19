<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function index()
    {
        $data = Reservasi::all();
        return view('admin.reservasi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.reservasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'paket_wisata_id' => 'required|exists:paket_wisata,id',
            'tanggal_reservasi' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        Reservasi::create($request->all());
        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('admin.reservasi.edit', compact('reservasi'));
    }

    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'paket_wisata_id' => 'required|exists:paket_wisata,id',
            'tanggal_reservasi' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
        ]);
        $reservasi->update($request->all());

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Reservasi::destroy($id);
        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}

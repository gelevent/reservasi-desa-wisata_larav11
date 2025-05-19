<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['pelanggan', 'paketWisata'])->get();
        return view('reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $paketWisatas = PaketWisata::all();
        return view('reservasi.create', compact('pelanggans', 'paketWisatas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'paket_wisata_id' => 'required|exists:paket_wisata,id',
            'tanggal_reservasi' => 'required|date',
            'jumlah_pengunjung' => 'required|integer|min:1',
            'status' => 'nullable|string',
        ]);

        Reservasi::create($validated);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function edit(Reservasi $reservasi)
    {
        $pelanggans = Pelanggan::all();
        $paketWisatas = PaketWisata::all();
        return view('reservasi.edit', compact('reservasi', 'pelanggans', 'paketWisatas'));
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'paket_wisata_id' => 'required|exists:paket_wisata,id',
            'tanggal_reservasi' => 'required|date',
            'jumlah_pengunjung' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);

        $reservasi->update($validated);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}

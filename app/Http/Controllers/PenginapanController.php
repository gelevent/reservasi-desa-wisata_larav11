<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapans = Penginapan::all();
        return view('penginapan.index', compact('penginapans'));
    }

    public function create()
    {
        return view('penginapan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        Penginapan::create($validated);

        return redirect()->route('penginapan.index')->with('success', 'Penginapan berhasil dibuat.');
    }

    public function edit(Penginapan $penginapan)
    {
        return view('penginapan.edit', compact('penginapan'));
    }

    public function update(Request $request, Penginapan $penginapan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        $penginapan->update($validated);

        return redirect()->route('penginapan.index')->with('success', 'Penginapan berhasil diperbarui.');
    }

    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();
        return redirect()->route('penginapan.index')->with('success', 'Penginapan berhasil dihapus.');
    }
}

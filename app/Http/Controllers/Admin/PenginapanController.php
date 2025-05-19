<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penginapan;

class PenginapanController extends Controller
{
    public function index()
    {
        $data = Penginapan::all();
        return view('admin.penginapan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.penginapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'jumlah_kamar' => 'required|integer|min:1'
        ]);

        Penginapan::create($request->all());
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        return view('admin.penginapan.edit', compact('penginapan'));
    }

    public function update(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'jumlah_kamar' => 'required|integer|min:1'
        ]);
        $penginapan->update($request->all());

        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penginapan::destroy($id);
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil dihapus.');
    }
}

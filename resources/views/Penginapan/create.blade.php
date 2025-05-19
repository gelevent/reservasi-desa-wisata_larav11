@extends('layouts.app')

@section('content')
<h1>Tambah Penginapan</h1>
<form action="{{ route('penginapan.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fasilitas</label>
        <textarea name="fasilitas" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Harga per Malam</label>
        <input type="number" name="harga_per_malam" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

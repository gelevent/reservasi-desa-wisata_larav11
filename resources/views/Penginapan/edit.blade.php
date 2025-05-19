@extends('layouts.app')

@section('content')
<h1>Edit Penginapan</h1>
<form action="{{ route('penginapan.update', $penginapan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $penginapan->nama) }}" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $penginapan->alamat) }}" required>
    </div>
    <div class="mb-3">
        <label>Fasilitas</label>
        <textarea name="fasilitas" class="form-control" required>{{ old('fasilitas', $penginapan->fasilitas) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Harga per Malam</label>
        <input type="number" name="harga_per_malam" class="form-control" value="{{ old('harga_per_malam', $penginapan->harga_per_malam) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

@extends('layouts.app')

@section('content')
<h1>Tambah Obyek Wisata</h1>
<form action="{{ route('obyek-wisata.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('obyek-wisata.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

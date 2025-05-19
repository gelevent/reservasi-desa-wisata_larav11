@extends('layouts.app')

@section('content')
<h1>Edit Obyek Wisata</h1>
<form action="{{ route('obyek-wisata.update', $obyekWisata->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $obyekWisata->nama) }}" required>
    </div>
    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $obyekWisata->lokasi) }}" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $obyekWisata->deskripsi) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('obyek-wisata.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection


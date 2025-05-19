@extends('layouts.app')

@section('content')
<h1>Tambah Berita</h1>

<form action="{{ route('berita.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
    </div>
    <div class="mb-3">
        <label>Isi</label>
        <textarea name="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_berita_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoriBeritas as $kategori)
                <option value="{{ $kategori->id }}" {{ old('kategori_berita_id') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

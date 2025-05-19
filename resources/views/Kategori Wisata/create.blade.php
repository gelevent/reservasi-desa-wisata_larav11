@extends('layouts.app')

@section('content')
<h1>Tambah Kategori Wisata</h1>
<form action="{{ route('kategori-wisata.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection

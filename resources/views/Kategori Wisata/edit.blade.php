@extends('layouts.app')

@section('content')
<h1>Edit Kategori Wisata</h1>
<form action="{{ route('kategori-wisata.update', $kategoriWisata->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $kategoriWisata->nama }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

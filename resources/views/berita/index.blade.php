@extends('layouts.app')

@section('content')
<h1>Daftar Berita</h1>

<a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($beritas as $berita)
        <tr>
            <td>{{ $berita->judul }}</td>
            <td>{{ $berita->kategoriBerita->nama }}</td>
            <td>{{ $berita->tanggal }}</td>
            <td>
                <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

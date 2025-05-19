@extends('layouts.app')

@section('content')
<h1>Kategori Berita</h1>
<a href="{{ route('kategori-berita.create') }}" class="btn btn-success mb-3">Tambah Kategori</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoriBerita as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>
                <a href="{{ route('kategori-berita.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('kategori-berita.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

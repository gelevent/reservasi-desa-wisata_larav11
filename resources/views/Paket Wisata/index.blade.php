@extends('layouts.app')

@section('content')
<h1>Paket Wisata</h1>
<a href="{{ route('paket-wisata.create') }}" class="btn btn-success mb-3">Tambah Paket</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paketWisata as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>
                <a href="{{ route('paket-wisata.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('paket-wisata.destroy', $item->id) }}" method="POST" class="d-inline">
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

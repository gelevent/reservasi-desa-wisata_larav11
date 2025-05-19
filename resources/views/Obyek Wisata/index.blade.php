@extends('layouts.app')

@section('content')
<h1>Data Obyek Wisata</h1>
<a href="{{ route('obyek-wisata.create') }}" class="btn btn-success mb-3">Tambah Obyek Wisata</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obyekWisata as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->lokasi }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>
                <a href="{{ route('obyek-wisata.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('obyek-wisata.destroy', $item->id) }}" method="POST" class="d-inline">
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

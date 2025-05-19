@extends('layouts.app')

@section('content')
<h1>Data Penginapan</h1>
<a href="{{ route('penginapan.create') }}" class="btn btn-success mb-3">Tambah Penginapan</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Fasilitas</th>
            <th>Harga per Malam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penginapan as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->fasilitas }}</td>
            <td>Rp{{ number_format($item->harga_per_malam, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('penginapan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('penginapan.destroy', $item->id) }}" method="POST" class="d-inline">
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

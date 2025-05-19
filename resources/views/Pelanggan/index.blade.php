@extends('layouts.app')

@section('content')
<h1>Data Pelanggan</h1>
<a href="{{ route('pelanggan.create') }}" class="btn btn-success mb-3">Tambah Pelanggan</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telepon }}</td>
            <td>
                <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="d-inline">
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

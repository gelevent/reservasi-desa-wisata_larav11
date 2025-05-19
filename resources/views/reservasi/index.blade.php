@extends('layouts.admin')

@section('content')
<h1>Daftar Reservasi</h1>
<a href="{{ route('reservasi.create') }}">Tambah Reservasi</a>

@if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pelanggan</th>
            <th>Paket Wisata</th>
            <th>Tanggal Reservasi</th>
            <th>Jumlah Pengunjung</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservasis as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->pelanggan->nama }}</td>
                <td>{{ $r->paketWisata->nama }}</td>
                <td>{{ $r->tanggal_reservasi }}</td>
                <td>{{ $r->jumlah_pengunjung }}</td>
                <td>{{ $r->status ?? '-' }}</td>
                <td>
                    <a href="{{ route('reservasi.edit', $r->id) }}">Edit</a>
                    <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

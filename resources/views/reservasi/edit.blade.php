@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Reservasi</h2>

    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ $reservasi->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="paket_wisata_id" class="form-label">Paket Wisata</label>
            <select name="paket_wisata_id" id="paket_wisata_id" class="form-control" required>
                <option value="">-- Pilih Paket Wisata --</option>
                @foreach($paketWisatas as $paket)
                    <option value="{{ $paket->id }}" {{ $reservasi->paket_wisata_id == $paket->id ? 'selected' : '' }}>
                        {{ $paket->nama_paket }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
            <input type="date" name="tanggal_reservasi" id="tanggal_reservasi" class="form-control" value="{{ $reservasi->tanggal_reservasi->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Reservasi</button>
    </form>
</div>
@endsection

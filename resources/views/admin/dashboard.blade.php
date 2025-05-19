@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard Admin</h1>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5 class="card-title">Berita</h5>
            <p class="card-text fs-2">{{ $totalBerita }}</p>
          </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
          <div class="card-body">
            <h5 class="card-title">Paket Wisata</h5>
            <p class="card-text fs-2">{{ $totalPaket }}</p>
          </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
          <div class="card-body">
            <h5 class="card-title">Reservasi</h5>
            <p class="card-text fs-2">{{ $totalReservasi }}</p>
          </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
          <div class="card-body">
            <h5 class="card-title">Pelanggan</h5>
            <p class="card-text fs-2">{{ $totalPelanggan }}</p>
          </div>
        </div>
    </div>
</div>
@endsection

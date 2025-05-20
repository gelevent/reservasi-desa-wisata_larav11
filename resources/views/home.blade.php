@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Hero --}}
    <section class="text-center py-5 bg-light rounded shadow mb-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Selamat Datang di Desa Wisata</h1>
            <p class="lead text-secondary">Temukan destinasi indah, penginapan nyaman, dan paket wisata terbaik untuk liburan Anda.</p>
        </div>
    </section>

    {{-- Obyek Wisata --}}
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4 fw-semibold">Obyek Wisata</h2>
            <div class="row g-4">
                @foreach ($obyekWisata->take(3) as $obyek)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <img src="{{ $obyek->gambar_url ?? 'https://via.placeholder.com/400x250' }}" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="{{ $obyek->nama }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $obyek->nama }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($obyek->deskripsi, 90) }}</p>
                                <a href="{{ route('admin.obyek-wisata.show', $obyek->id) }}" class="btn btn-primary mt-auto w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-end mt-3">
                <a href="{{ route('admin.obyek-wisata.index') }}" class="btn btn-outline-dark">Lihat Semua</a>
            </div>
        </div>
    </section>

    {{-- Paket Wisata --}}
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4 fw-semibold">Paket Wisata</h2>
            <div class="row g-4">
                @foreach ($paketWisata->take(3) as $paket)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $paket->nama }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($paket->deskripsi, 100) }}</p>
                                <p class="fw-bold text-success mt-2">Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('admin.paket-wisata.show', $paket->id) }}" class="btn btn-primary mt-auto w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-end mt-3">
                <a href="{{ route('admin.paket-wisata.index') }}" class="btn btn-outline-dark">Lihat Semua</a>
            </div>
        </div>
    </section>

    {{-- Berita Terbaru --}}
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4 fw-semibold">Berita Terbaru</h2>
            <div class="row g-4">
                @foreach ($berita->take(3) as $item)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="text-muted"><small>{{ $item->created_at->format('d M Y') }}</small></p>
                                <p class="card-text">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                                <a href="{{ route('admin.berita.show', $item->id) }}" class="btn btn-primary mt-auto w-100">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-end mt-3">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-dark">Lihat Semua</a>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    @if (!Auth::check())
        <div class="mb-4">
            <a href="{{ Route::has('login') ? route('login') : '#' }}" class="btn btn-success">Login</a>
        </div>
    @else
        <div class="mb-4">
            <form method="POST" action="{{ Route::has('logout') ? route('logout') : '#' }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    @endif

    <h1>Selamat Datang di Desa Wisata</h1>

    <h2>Obyek Wisata Terbaru</h2>
    <div class="row">
        @foreach ($obyekWisata->take(3) as $obyek)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ $obyek->gambar_url ?? 'https://via.placeholder.com/350x150' }}" class="card-img-top"
                        alt="{{ $obyek->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $obyek->nama }}</h5>
                        <p class="card-text">{{ Str::limit($obyek->deskripsi, 100) }}</p>
                        <a href="{{ Route::has('obyek.show') ? route('obyek.show', $obyek->id) : '#' }}"
                            class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-4">
        <a href="{{ Route::has('obyek.index') ? route('obyek.index') : '#' }}" class="btn btn-outline-secondary">Lihat Semua
            Obyek Wisata</a>
    </div>

    <h2>Paket Wisata Terbaru</h2>
    <div class="row">
        @foreach ($paketWisata->take(3) as $paket)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $paket->nama }}</h5>
                        <p class="card-text">{{ Str::limit($paket->deskripsi, 100) }}</p>
                        <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>
                        <a href="{{ Route::has('paket.show') ? route('paket.show', $paket->id) : '#' }}"
                            class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-4">
        <a href="{{ Route::has('paket.index') ? route('paket.index') : '#' }}" class="btn btn-outline-secondary">Lihat
            Semua Paket Wisata</a>
    </div>

    <h2>Berita Terbaru</h2>
    <ul>
        @foreach ($berita->take(3) as $item)
            <li>
                <a href="{{ Route::has('berita.show') ? route('berita.show', $item->id) : '#' }}">{{ $item->judul }}</a>
                - {{ $item->created_at->format('d M Y') }}
            </li>
        @endforeach
    </ul>
    <div class="text-end">
        <a href="{{ Route::has('berita.index') ? route('berita.index') : '#' }}" class="btn btn-outline-secondary">Lihat Semua Berita</a>
    </div>
@endsection

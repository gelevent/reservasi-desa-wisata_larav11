@extends('layouts.app')

@section('content')
<h1>Edit Pelanggan</h1>
<form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}" required>
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ $pelanggan->telepon }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

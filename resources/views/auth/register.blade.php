@extends('layouts.app') {{-- atau sesuaikan layout yang kamu pakai --}}

@section('content')
<div class="container mx-auto max-w-md mt-10 p-6 border rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrasi Akun</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-1 font-semibold">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1 font-semibold">Password</label>
            <input type="password" name="password" id="password" required
                class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block mb-1 font-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                class="w-full border px-3 py-2 rounded" />
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700">
            Daftar
        </button>
    </form>
</div>
@endsection

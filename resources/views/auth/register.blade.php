@extends('layouts.app')

@section('content')
<style>
  /* CSS dari referensi kamu disini */
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  body {
    background: #4070f4;
  }
  .wrapper {
    position: relative;
    max-width: 430px;
    width: 100%;
    background: #fff;
    padding: 34px;
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    margin: 3rem auto;
  }
  .wrapper h2 {
    position: relative;
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
  }
  .wrapper h2::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 28px;
    border-radius: 12px;
    background: #4070f4;
  }
  form .input-box {
    height: 52px;
    margin: 18px 0;
  }
  form .input-box input {
    height: 100%;
    width: 100%;
    outline: none;
    padding: 0 15px;
    font-size: 17px;
    font-weight: 400;
    color: #333;
    border: 1.5px solid #C7BEBE;
    border-bottom-width: 2.5px;
    border-radius: 6px;
    transition: all 0.3s ease;
  }
  .input-box input:focus,
  .input-box input:valid {
    border-color: #4070f4;
  }
  form .policy {
    display: flex;
    align-items: center;
  }
  form .policy input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
  }
  form .policy h3 {
    color: #707070;
    font-size: 14px;
    font-weight: 500;
    margin-left: 10px;
  }
  .input-box.button input {
    color: #fff;
    letter-spacing: 1px;
    border: none;
    background: #4070f4;
    cursor: pointer;
    border-radius: 6px;
  }
  .input-box.button input:hover {
    background: #0e4bf1;
  }
  form .text h3 {
    color: #333;
    width: 100%;
    text-align: center;
    margin-top: 20px;
  }
  form .text h3 a {
    color: #4070f4;
    text-decoration: none;
  }
  form .text h3 a:hover {
    text-decoration: underline;
  }
  .error-list {
    margin-bottom: 15px;
    color: #d9534f;
    background-color: #f8d7da;
    border-radius: 4px;
    padding: 10px 15px;
    border: 1px solid #f5c6cb;
  }
</style>

<div class="wrapper">
    <h2>Registrasi Akun</h2>

    @if ($errors->any())
        <div class="error-list">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="input-box">
            <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap" />
        </div>

        <div class="input-box">
            <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="Masukkan email" />
        </div>

        <div class="input-box">
            <input type="password" name="password" id="password" required placeholder="Buat password" />
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Konfirmasi password" />
        </div>

        <div class="policy">
            <input type="checkbox" id="terms" required />
            <h3><label for="terms" style="cursor:pointer;">Saya menyetujui semua syarat & ketentuan</label></h3>
        </div>

        <div class="input-box button">
            <input type="submit" value="Daftar Sekarang" />
        </div>

        <div class="text">
            <h3>Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a></h3>
        </div>
    </form>
</div>
@endsection

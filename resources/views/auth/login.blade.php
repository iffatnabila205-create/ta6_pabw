@extends('layouts.app')

@section('title', 'Login | TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endpush

@section('content')
  @if (session('status'))
    <div class="message success" id="flash">{{ session('status') }}</div>
  @endif
  @if ($errors->any())
    <div class="message error" id="flash">{{ $errors->first() }}</div>
  @endif

  <div class="login-container">

    <!-- LEFT IMAGE -->
    <div class="login-image">
      <div class="overlay">
        <h1>TOUGAR</h1>
        <p>Menjelajahi Keindahan Alam & Budaya Garut</p>
      </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="login-form">
      <img src="{{ asset('assets/img/logo.png') }}" alt="TOUGAR Logo" class="logo">

      <h2>Login Akun</h2>
      <p>Silakan masuk untuk melanjutkan perjalanan wisata Anda</p>

      <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <div class="input-group">
          <i class="fa fa-user"></i>
          <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
        </div>

        <div class="input-group">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember" value="1"> Ingat saya
          </label>
          <a href="{{ route('password.forgot') }}">Lupa password?</a>
        </div>

        <button type="submit">Masuk</button>
        


        <p class="register">
          Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </p>
      </form>
    </div>

  </div>
@endsection

@push('scripts')
    <script>setTimeout(function(){var f=document.getElementById('flash');if(f)f.remove();},4000);</script>
@endpush

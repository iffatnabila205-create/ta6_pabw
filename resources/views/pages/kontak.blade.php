@extends('layouts.app')

@section('title', 'Kontak TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/kontak.css') }}">
    <style>
        .flash { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-weight: 500; }
        .flash-success { background: #d1fae5; color: #065f46; }
        .flash-error { background: #fee2e2; color: #991b1b; }
        .kembali { color: #fff; text-decoration: none; display: inline-block; margin-bottom: 12px; }
    </style>
@endpush

@section('content')
  <section class="kontak-section">
    <div class="overlay"></div>

    <div class="kontak-container">
      <a href="{{ route('beranda') }}" class="kembali">&larr; Kembali ke Beranda</a>
      <h1 class="judul">Kontak TOUGAR</h1>
      <p class="subjudul">Hubungi kami untuk informasi wisata, rekomendasi tempat, dan saran perjalanan terbaik di Garut.</p>

      @if (session('status'))
        <p class="flash flash-success">{{ session('status') }}</p>
      @endif
      @if ($errors->any())
        <p class="flash flash-error">{{ $errors->first() }}</p>
      @endif

      <form class="kontak-form" method="POST" action="{{ route('kontak.store') }}">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Anda" required>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Anda" required>
        <textarea name="message" placeholder="Pesan Anda..." required>{{ old('message') }}</textarea>
        <button type="submit">Kirim Pesan</button>
      </form>

      <div class="info-box">
        <h3>Informasi Kontak</h3>
        <p>📍 Alamat: Garut Kota, Jawa Barat</p>
        <p>📞 Telepon: 0812-3456-7890</p>
        <p>📧 Email: Tougar@Gmail.com</p>
      </div>
    </div>

  </section>
  
@endsection

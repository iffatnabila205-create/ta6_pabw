@extends('layouts.app')

@section('title', $galeri->judul.' | TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">
@endpush

@section('content')
<div class="g-wrap">
  <a href="{{ route('galeri.index') }}" class="g-back">&larr; Kembali ke Galeri</a>
  <div class="g-top"></div>

  <div class="detail">
    <img src="{{ $galeri->foto_url }}" alt="{{ $galeri->judul }}">
    <div class="card-body">
      <h3>{{ $galeri->judul }}</h3>
      <div class="lokasi"><i class="fa-solid fa-location-dot"></i> {{ $galeri->lokasi }}</div>
      <p>{!! nl2br(e($galeri->deskripsi)) !!}</p>
      <div class="meta">Diunggah oleh {{ $galeri->user->name ?? 'pengguna' }} &middot; {{ $galeri->created_at->format('d M Y H:i') }}</div>
    </div>
    <div class="actions">
      <a href="{{ route('galeri.unduh', $galeri) }}" class="btn btn-light">Unduh Foto</a>
      @if ($galeri->user_id === auth()->id())
        <a href="{{ route('galeri.edit', $galeri) }}" class="btn">Edit</a>
        <form method="POST" action="{{ route('galeri.destroy', $galeri) }}" onsubmit="return confirm('Hapus foto ini?')">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      @endif
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Galeri Wisata | TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">
@endpush

@section('content')
<div class="g-wrap">
  <a href="{{ route('beranda') }}" class="g-back">&larr; Kembali ke Beranda</a>

  <div class="g-top">
    <h1>Galeri Wisata Garut</h1>
    <a href="{{ route('galeri.create') }}" class="btn"><i class="fa-solid fa-plus"></i> Tambah Foto</a>
  </div>

  @if (session('status'))
    <p class="flash flash-success">{{ session('status') }}</p>
  @endif

  @if ($galeris->isEmpty())
    <div class="empty">Belum ada foto. Klik "Tambah Foto" untuk mengunggah foto wisata pertama.</div>
  @else
    <div class="grid">
      @foreach ($galeris as $g)
        <article class="card">
          <img src="{{ $g->foto_url }}" alt="{{ $g->judul }}" loading="lazy">
          <div class="card-body">
            <h3>{{ $g->judul }}</h3>
            <div class="lokasi"><i class="fa-solid fa-location-dot"></i> {{ $g->lokasi }}</div>
            <p>{{ \Illuminate\Support\Str::limit($g->deskripsi, 90) }}</p>
            <div class="meta">oleh {{ $g->user->name ?? 'pengguna' }} &middot; {{ $g->created_at->diffForHumans() }}</div>
          </div>
          <div class="actions">
            <a href="{{ route('galeri.show', $g) }}" class="btn btn-light">Lihat</a>
            <a href="{{ route('galeri.unduh', $g) }}" class="btn btn-light">Unduh</a>
            @if ($g->user_id === auth()->id())
              <a href="{{ route('galeri.edit', $g) }}" class="btn">Edit</a>
              <form method="POST" action="{{ route('galeri.destroy', $g) }}" onsubmit="return confirm('Hapus foto ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            @endif
          </div>
        </article>
      @endforeach
    </div>

    <div class="pagination-wrap">{{ $galeris->links('pagination::default') }}</div>
  @endif
</div>
@endsection

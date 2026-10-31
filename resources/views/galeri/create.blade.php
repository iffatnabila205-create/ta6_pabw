@extends('layouts.app')

@section('title', 'Tambah Foto | TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">
@endpush

@section('content')
<div class="g-wrap">
  <a href="{{ route('galeri.index') }}" class="g-back">&larr; Kembali ke Galeri</a>
  <div class="g-top"><h1>Tambah Foto Wisata</h1></div>

  @if ($errors->any())
    <div class="flash flash-error">Periksa kembali isian Anda.</div>
  @endif

  <form class="form-box" method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
    @include('galeri._form')
  </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'TOUGAR - Smart Tourism Garut')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
@endpush

@section('content')
<div class="main-bg">

<!-- Navbar -->
<nav class="navbar">
<h2 class="logo">TOUGAR | Tour Garut</h2>

<ul>
<li><a href="{{ route('beranda') }}">Beranda</a></li>
<li><a href="#wisata">Destinasi</a></li>
<li><a href="{{ route('login') }}">Login</a></li>
</ul>
</nav>

<!-- Hero -->
<section class="hero">

<div class="hero-text">
<h1>Jelajahi Keindahan Garut</h1>
<p>Temukan destinasi wisata terbaik bersama TOUGAR</p>

<a href="#wisata">
<button>Mulai Jelajah</button>
</a>

</div>

</section>

<!-- Destinasi -->
<section id="wisata" class="wisata">

<h2>Destinasi Populer</h2>

<div class="card-container">

<div class="card">
<img src="{{ asset('assets/img/papandayan.jpeg') }}">
<h3>Gunung Papandayan</h3>
<p>Keindahan gunung dengan padang edelweiss.</p>
</div>

<div class="card">
<img src="{{ asset('assets/img/santolo.webp') }}">
<h3>Pantai Santolo</h3>
<p>Pantai terkenal dengan pasir putih.</p>
</div>

<div class="card">
<img src="{{ asset('assets/img/situ-bagendit.jpg') }}">
<h3>Situ Bagendit</h3>
<p>Danau wisata yang terkenal di Garut.</p>
</div>

</div>

</section>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/landing.js') }}"></script>
@endpush

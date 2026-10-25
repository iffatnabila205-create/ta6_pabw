@extends('layouts.app')

@section('title', 'Laporan Statistik Pariwisata Garut')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/laporan.css') }}">
@endpush

@section('content')
  <!-- HEADER -->
<header class="hero-header">
    <div class="hero-content">
        <h1>Laporan Statistik Pariwisata Garut</h1>
        <p>
            Pantau tren kunjungan wisata, destinasi favorit, dan perkembangan
            sektor pariwisata Kabupaten Garut secara real-time.
        </p>
    </div>
</header>

<div class="background-overlay"></div>

<div class="container">

    <div class="card">
        <h2>Pengunjung Lokasi Populer</h2>
        <p class="subtitle">Jumlah Pengunjung</p>
        <canvas id="lokasiChart"></canvas>
    </div>

    <div class="card">
        <h2>Tren Wisata</h2>
        <p class="subtitle">Jumlah Pengunjung</p>
        <canvas id="trenChart"></canvas>
    </div>

</div>



 <!-- FOOTER -->
  @include('partials.footer')
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/laporan.js') }}"></script>
@endpush

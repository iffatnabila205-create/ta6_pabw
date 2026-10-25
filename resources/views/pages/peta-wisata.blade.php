@extends('layouts.app')

@section('title', 'Peta Wisata Garut | TOUGAR')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="{{ asset('assets/css/peta-wisata.css') }}">
@endpush

@section('content')
    <header class="page-header">
        <h1>Peta Wisata Garut</h1>
        <p>
            Jelajahi lokasi wisata Garut melalui peta interaktif
            dengan detail lengkap.
        </p>
    </header>

    <main>
        <section class="map-container">
            <div id="map"></div>
        </section>
    </main>

    <!-- Footer -->
    @include('partials.footer')

    
    

    
    
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('assets/js/peta-wisata.js') }}"></script>
@endpush

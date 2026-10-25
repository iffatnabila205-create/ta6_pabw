@extends('layouts.app')

@section('title', 'Paket Wisata Garut — Booking')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/paket-wisata.css') }}">
@endpush

@section('content')
  <header class="header">
    <h1>Paket Wisata Garut</h1>
    <p>Pilih paket terbaik, klik "Detail" untuk informasi dan "Pesan" untuk booking.</p>
  </header>

  <main class="paket-container" id="paketContainer">
    <!-- Paket 1 -->
    <article class="paket-card" data-id="pkt1" data-title="Paket Darajat Pass" 
             data-img="https://images.unsplash.com/photo-1506905925346-21bda4d32df4">
      <div class="card-media">
        <img src="{{ asset('assets/img/darajat-pass-garut.png') }}" alt="Darajat Pass">
        <div class="badge">⭐ Populer</div>
      </div>
      <div class="card-body">
        <h3>Paket Darajat Pass</h3>
        <p class="muted">Kolam air panas, view perbukitan, flaying fox, Hotel</p>
        <div class="card-footer">
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 2 -->
    <article class="paket-card" data-id="pkt2" data-title="Paket Situ Bagendit" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/situ-bagendit.jpg') }}" alt="Situ Bagendit">
        <div class="badge">🌈 Best View</div>
      </div>
      <div class="card-body">
        <h3>Paket Situ Bagendit</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 3 -->
    <article class="paket-card" data-id="pkt3" data-title="Paket Kawah Kamojang" 
             data-img="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b">
      <div class="card-media">
        <img src="{{ asset('assets/img/santolo.webp') }}" alt="Santolo Beach">
        <div class="badge">🌊 Beach</div>
      </div>
      <div class="card-body">
        <h3>Paket Pantai Santolo </h3>
        <p class="muted">Petualangan seru dari laut, Pasir, Tebing-tebing eksotis</p>
        <div class="card-footer">
          <span class="price">Mulai 300rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 4 -->
    <article class="paket-card" data-id="pkt4" data-title="Paket Talaga Bodas" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/talaga-bodas.jpeg') }}" alt="Talaga Bodas">
      <div class="card-body">
        <h3>Paket Talaga Bodas</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 5 -->
    <article class="paket-card" data-id="pkt5" data-title="Paket Gunung Papandayan" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/papandayan.jpeg') }}" alt="Gunung papandayan">
      <div class="card-body">
        <h3>Paket Gunung Papandayan</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 6 -->
    <article class="paket-card" data-id="pkt6" data-title="Paket Kolam Renang Cipanas" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/cipanas.webp') }}" alt="Kolam Renang Cipanas">
      <div class="card-body">
        <h3>Paket Kolam Renang Cipanas</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 7 -->
    <article class="paket-card" data-id="pkt7" data-title="Paket Gunung Cikuray" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/gunung-cikuray.jpeg') }}" alt="Gunung Cikuray">
      <div class="card-body">
        <h3>Paket Gunung Cikuray</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 8 -->
    <article class="paket-card" data-id="pkt8" data-title="Paket Kawah Kamojang" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/kamojang_hill_bridge.jpg') }}" alt="Kawah Kamojang">
      <div class="card-body">
        <h3>Paket Kawah Kamojang</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

    <!-- Paket 9 -->
    <article class="paket-card" data-id="pkt9" data-title="Paket Dinoland Garut" 
             data-img="https://images.unsplash.com/photo-1439066615861-d1af74d74000">
      <div class="card-media">
        <img src="{{ asset('assets/img/dinoland.jpg') }}" alt="Dinoland Garut">
      <div class="card-body">
        <h3>Paket Dinoland Garut</h3>
        <p class="muted">Danau legenda, perahu wisata, spot foto instagramable</p>
        <div class="card-footer">
          <span class="price">Mulai 200rb</span>
          <div class="actions">
            <button class="btn btn-detail" data-action="detail">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Detail
            </button>
            <button class="btn btn-pesan" data-action="pesan">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
              Pesan
            </button>
          </div>
        </div>
      </div>
    </article>

  </main>

  <div class="modal" id="modal" aria-hidden="true">
    <div class="modal-backdrop" id="modalBackdrop"></div>
    <div class="modal-panel">
      <button class="modal-close" id="modalClose">x</button>
      <div class="modal-content" id="modalContent">
      </div>
    </div>
  </div>

  
 

  <!-- FOOTER -->
  @include('partials.footer')
@endsection

@push('scripts')
    <script>
        window.packagesData = @json(config('paket'));
        window.BOOKING_URL = "{{ route('booking.store') }}";
    </script>
    <script src="{{ asset('assets/js/paket-wisata.js') }}"></script>
@endpush

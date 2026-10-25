@extends('layouts.app')

@section('title', 'TOUGAR | TOUR GARUT')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/beranda.css') }}">
@endpush

@section('content')
  <!-- FAVORIT -->
    <a href="#" class="floating-wishlist">
    ❤️ <span id="wishlist-count">0</span>
  </a>

  <!-- LOGOUT ICON ONLY -->
<form method="POST" action="{{ route('logout') }}" id="logout-form" style="display:none">@csrf</form>
<div class="logout-icon-body" onclick="logout()" title="Logout">
  <i class="fa-solid fa-right-from-bracket"></i>
</div>


  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo TOUGAR">
      <span>TOUGAR</span>
    </div>
    <h1>TOUGAR | TOUR GARUT</h1>
    <p>Menjelajahi Keindahan Alam & Budaya Garut</p>
  </header>

  <!-- NAVIGATION -->
  <nav>
    <a href="{{ route('beranda') }}">Beranda</a>
    <a href="{{ route('destinasi') }}">Destinasi</a>  
    <a href="{{ route('paket') }}">Paket</a>
    <a href="{{ route('peta') }}">Peta</a>
    <a href="{{ route('laporan') }}">Laporan</a>
    <a href="{{ route('kontak') }}">Kontak</a>
  </nav>

  <!-- SLIDER -->
  <section class="slider">
    <div class="slides">
      <img src="{{ asset('assets/img/papandayan.jpeg') }}" alt="Gunung Papandayan">
      <img src="{{ asset('assets/img/cipanas.webp') }}" alt="Kolam Renang Cipanas Garut">
      <img src="{{ asset('assets/img/situ-bagendit.jpg') }}" alt="Situ Bagendit">
      <img src="{{ asset('assets/img/santolo.webp') }}" alt="Pantai Santolo Beach">
      <img src="{{ asset('assets/img/kamojang.jpeg') }}" alt="Kamojang">
      <!-- Duplikasi untuk efek infinite -->
      <img src="{{ asset('assets/img/papandayan.jpeg') }}" alt="Gunung Papandayan">
      <img src="{{ asset('assets/img/cipanas.webp') }}" alt="Kolam Renang Cipanas Garut">
      <img src="{{ asset('assets/img/situ-bagendit.jpg') }}" alt="Situ Bagendit">
      <img src="{{ asset('assets/img/santolo.webp') }}" alt="Pantai Santolo Beach">
      <img src="{{ asset('assets/img/kamojang.jpeg') }}" alt="Kamojang">
    </div>
  </section>

  <!-- MAIN CONTENT -->
  <main>
    <article>
      <h2>TOUGAR | TOUR GARUT</h2>
      <img src="{{ asset('assets/img/logo.png') }}" alt="TOUGAR">
      <p>Nikmati pengalaman tak terlupakan menjelajahi keindahan alam dan budaya khas Garut bersama <strong>TOUGAR | TOUR GARUT</strong>. Dalam perjalanan ini, Anda akan diajak menikmati udara sejuk pegunungan, relaksasi di pemandian air panas alami, serta mencicipi kuliner legendaris seperti dodol Garut dan sambal cibiuk yang menggugah selera.</p>
      <p>Paket tour kami dirancang untuk menghadirkan keseimbangan antara petualangan dan kenyamanan. Mulai dari wisata alam di Gunung Papandayan, keseruan Pantai Santolo Beach dan Situ Bagendit, hingga suasana santai di Pemandian Air Panas Cipanas semua disusun dengan jadwal yang fleksibel dan layanan ramah.</p>
      <p>Dengan pemandu profesional dan fasilitas terbaik, TOUGAR siap membawa Anda menikmati keindahan Garut dengan cara yang berbeda: <em>lebih dekat, lebih hangat, dan lebih berkesan.</em></p>
    </article>

    <aside>
      <h3>Destinasi Populer</h3>
      <ul>
        <li><a href="#">Kolam Renang Cipanas</a></li>
        <li><a href="#">Situ Bagendit</a></li>
        <li><a href="#">Pantai Santolo Beach</a></li>
        <li><a href="#">Kawah Kamojang</a></li>
        <li><a href="#">Gunung Papandayan</a></li>
      </ul>

      <h3>Info Wisata</h3>
      <ul>
        <li><a href="#">Tips Liburan di Garut</a></li>
        <li><a href="#">Kuliner Khas Garut</a></li>
        <li><a href="#">Rute dan Transportasi</a></li>
      </ul>
    </aside>
  </main>

  <!-- FOOTER -->
  @include('partials.footer')
@endsection

@push('scripts')
    <script defer src="{{ asset('assets/js/beranda.js') }}"></script>
@endpush

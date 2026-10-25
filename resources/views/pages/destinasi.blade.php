@extends('layouts.app')

@section('title', 'Destinasi Wisata Garut')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/destinasi.css') }}">
@endpush

@section('content')
  <!-- HEADER -->
  <header class="header">
    <h1>Destinasi Wisata Garut</h1>
    <p>Temukan wisata alam terbaik yang wajib kamu kunjungi!</p>
  </header>

  <!-- GRID DESTINASI -->
  <section class="destinasi-container">

    <div class="card" data-animate>
      <img src="{{ asset('assets/img/cipanas.webp') }}" alt="Cipanas">
      <h3>Kolam Renang Cipanas</h3>
      <p>Pemandian air panas lengkap dengan kolam, hotel, dan wahana.</p>
    </div>

    <div class="card" data-animate>
      <img src="{{ asset('assets/img/situ-bagendit.jpg') }}" alt="Situ Bagendit">
      <h3>Situ Bagendit</h3>
      <p>Danau (situ) yang merupakan destinasi wisata alam unggulan yang terkenal dengan keindahan alamnya dan kisah legenda rakyat yang menyelimutinya.</p>
    </div>

    <div class="card" data-animate>
      <img src="{{ asset('assets/img/santolo.webp') }}" alt="Pantai Santolo">
      <h3>Pantai Santolo</h3>
      <p>Pantai pasir putih yang indah, cocok untuk menikmati sunset dan wisata.</p>
    </div>

    <div class="card" data-animate>
      <img src="{{ asset('assets/img/gunung-cikuray.jpeg') }}" alt="Gunung Cikuray">
      <h3>Gunung Cikuray</h3>
      <p>Gunung favorit pendaki,gunung berapi dan merupakan salah satu tujuan pendakian populer serta gunung tertinggi di Garut. </p>
    </div>

    <div class="card" data-animate>
      <img src="{{ asset('assets/img/kamojang_hill_bridge.jpg') }}" alt="Kamojang">
      <h3>Kawah Kamojang</h3>
      <p>Kawasan wisata geothermal dengan asap panas alami dan pemandangan pegunungan.</p>
    </div>

    <div class="card" data-animate>
      <img src="{{ asset('assets/img/papandayan.jpeg') }}" alt="Gunung Papandayan">
      <h3>Gunung Papandayan</h3>
      <p>Gunung favorit pendaki view indah dan ada bunga edelweis.</p>
    </div>

     <div class="card" data-animate>
      <img src="{{ asset('assets/img/darajat.jpeg') }}" alt="Kolam Renang Darajat Pass">
      <h3>Kolam Renang Darajat Pass</h3>
      <p>Kolam air panas alami di dataran tinggi Garut dengan view perbukitan</p>
    </div>

     <div class="card" data-animate>
      <img src="{{ asset('assets/img/talaga-bodas.jpeg') }}" alt="Talaga Bodas">
      <h3>Talaga Bodas</h3>
      <p>Danau kawah vulkanis yang terkenal dengan airnya yang berwarna putih kehijauan karena bercampur belerang,pemandangan alam yang indah dan fasilitas pemandian air panas alami</p>
    </div>

  </section>
  

    <!-- FOOTER -->
  @include('partials.footer')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/destinasi.js') }}"></script>
@endpush

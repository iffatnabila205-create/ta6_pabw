@extends('layouts.app')

@section('title', 'Admin Dashboard - TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin-dashboard.css') }}">
@endpush

@section('content')
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo TOUGAR">
      <h2>TOUGAR Admin</h2>
    </div>
    
    <nav class="sidebar-nav">
      <a href="#dashboard" class="nav-link active" data-section="dashboard">
        <span>📊</span> Dashboard
      </a>
      <a href="#destinasi" class="nav-link" data-section="destinasi">
        <span>🏞️</span> Kelola Destinasi
      </a>
      <a href="#paket" class="nav-link" data-section="paket">
        <span>📦</span> Kelola Paket Wisata
      </a>
      <a href="#peta" class="nav-link" data-section="peta">
        <span>🗺️</span> Kelola Peta
      </a>
      <a href="#laporan" class="nav-link" data-section="laporan">
        <span>📋</span> Kelola Laporan
      </a>
      <a href="#kontak" class="nav-link" data-section="kontak">
        <span>📞</span> Pesan Kontak
      </a>
      <a href="#slider" class="nav-link" data-section="slider">
        <span>🖼️</span> Kelola Slider
      </a>
      <a href="#users" class="nav-link" data-section="users">
        <span>👥</span> Kelola User
      </a>
    </nav>

    <div class="sidebar-footer">
      <a href="{{ route('beranda') }}" class="btn-logout">
        <span>🏠</span> Kembali ke Website
      </a>
      <form method="POST" action="{{ route('admin.logout') }}" style="margin-top:10px">
        @csrf
        <button type="submit" class="btn-logout" style="width:100%;border:0;cursor:pointer;font:inherit">
          <span>🚪</span> Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    
    <!-- HEADER -->
    <header class="top-header">
      <h1 id="page-title">Dashboard</h1>
      <div class="admin-info">
        <span>Admin: <strong>{{ auth()->user()->name }}</strong></span>
      </div>
    </header>

    <!-- DASHBOARD SECTION -->
    <section id="dashboard" class="content-section active">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon">🏞️</div>
          <div class="stat-info">
            <h3 id="total-destinasi">0</h3>
            <p>Total Destinasi</p>
          </div>
        </div>
        
        <div class="stat-card">
          <div class="stat-icon">📦</div>
          <div class="stat-info">
            <h3 id="total-paket">0</h3>
            <p>Total Paket Wisata</p>
          </div>
        </div>
        
        <div class="stat-card">
          <div class="stat-icon">📋</div>
          <div class="stat-info">
            <h3 id="total-laporan">0</h3>
            <p>Total Laporan</p>
          </div>
        </div>
        
        <div class="stat-card">
          <div class="stat-icon">📞</div>
          <div class="stat-info">
            <h3 id="total-kontak">0</h3>
            <p>Pesan Kontak</p>
          </div>
        </div>
      </div>

      <div class="recent-activity">
        <h2>Aktivitas Terbaru</h2>
        <div class="activity-list" id="activity-list">
          <p class="no-data">Belum ada aktivitas</p>
        </div>
      </div>
    </section>

    <!-- DESTINASI SECTION -->
    <section id="destinasi" class="content-section">
      <div class="section-header">
        <button class="btn-primary" onclick="showAddDestinasiModal()">+ Tambah Destinasi</button>
      </div>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Nama Destinasi</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="destinasi-table-body">
            <tr>
              <td colspan="6" class="no-data">Belum ada data destinasi</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- PAKET WISATA SECTION -->
    <section id="paket" class="content-section">
      <div class="section-header">
        <button class="btn-primary" onclick="showAddPaketModal()">+ Tambah Paket</button>
      </div>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Paket</th>
              <th>Durasi</th>
              <th>Harga</th>
              <th>Destinasi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="paket-table-body">
            <tr>
              <td colspan="7" class="no-data">Belum ada data paket wisata</td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </section>

    <!-- PETA SECTION -->
    <section id="peta" class="content-section">
      <div class="section-header">
        <button class="btn-primary" onclick="showAddPetaModal()">+ Tambah Lokasi</button>
      </div>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lokasi</th>
              <th>Koordinat</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="peta-table-body">
            <tr>
              <td colspan="6" class="no-data">Belum ada data lokasi</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- LAPORAN SECTION -->
    <section id="laporan" class="content-section">
      <div class="section-header">
      </div>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Kategori</th>
              <th>Pesan</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="laporan-table-body">
            <tr>
              <td colspan="7" class="no-data">Belum ada laporan</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- KONTAK SECTION -->
    <section id="kontak" class="content-section">
      <div class="section-header">
      </div>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Pesan</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="kontak-table-body">
            <tr>
              <td colspan="7" class="no-data">Belum ada pesan kontak</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- SLIDER SECTION -->
    <section id="slider" class="content-section">
      <div class="section-header">
        <button class="btn-primary" onclick="showAddSliderModal()">+ Tambah Slide</button>
      </div>

      <div class="slider-grid" id="slider-grid">
        <p class="no-data">Belum ada slide</p>
      </div>
    </section>

    <!-- USERS SECTION -->
    <section id="users" class="content-section">
      <div class="section-header">
        <button class="btn-primary" onclick="showAddUserModal()">+ Tambah User</button>
      </div>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="users-table-body">
            <tr>
              <td colspan="6" class="no-data">Belum ada data user</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- FOOTER -->
    @include('partials.footer')

  </main>

  <!-- MODAL CONTAINER -->
  <div id="modal-container"></div>

  
@endsection

@push('scripts')
    <script>window.IMG_BASE = "{{ asset('assets/img') }}/";</script>
    <script src="{{ asset('assets/js/admin-dashboard.js') }}"></script>
@endpush

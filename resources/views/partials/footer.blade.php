<footer class="footer-dark">
    <div class="footer-container">

        <!-- LOGO -->
        <div class="footer-brand">
            <img src="{{ asset('assets/img/logo-removebg-preview.png') }}" alt="TOUGAR Logo">
            <p>TOUGAR | TOUR GARUT</p>
        </div>

        <!-- MENU -->
        <div class="footer-column">
            <h4>Menu</h4>
            <a href="{{ route('beranda') }}">Beranda</a>
            <a href="{{ route('destinasi') }}">Destinasi</a>
            <a href="{{ route('paket') }}">Paket Wisata</a>
            <a href="{{ route('peta') }}">Peta Wisata</a>
            <a href="{{ route('kontak') }}">Kontak</a>
        </div>

        <!-- INFORMASI -->
        <div class="footer-column">
            <h4>Informasi</h4>
            <a href="#">Tentang Kami</a>
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat &amp; Ketentuan</a>
            <a href="#">Kebijakan Cookie</a>
            <a href="{{ route('kontak') }}">Hubungi Kami</a>
        </div>

        <!-- MEDIA SOSIAL -->
        <div class="footer-column">
            <h4>Media Sosial</h4>
            <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-youtube"></i> YouTube</a>
            <a href="#"><i class="fab fa-tiktok"></i> TikTok</a>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; {{ date('Y') }} TOUGAR | TOUR GARUT — Jelajahi Alam &amp; Budaya Garut
    </div>
</footer>

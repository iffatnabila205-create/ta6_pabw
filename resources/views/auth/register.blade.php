@extends('layouts.app')

@section('title', 'Register | TOUGAR')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endpush

@section('content')
    <div class="register-container">

        <!-- BAGIAN KIRI -->
        <div class="hero-panel">
            <div class="hero-content">
                <h1>TOUGAR</h1>
                <p>Menjelajahi Keindahan Alam &amp; Budaya Garut</p>
            </div>
        </div>

        <!-- BAGIAN KANAN -->
        <div class="form-panel">

            <!-- LOGO -->
            <div class="brand">
                <div class="brand-icon">✦</div>

                <div>
                    <strong>TOUGAR</strong>
                    <small>TOUR GARUT</small>
                </div>
            </div>

            <h2>Daftar Akun</h2>

            <p class="subtitle">
                Buat akun untuk memulai perjalanan wisata Anda
            </p>

            <!-- FORM REGISTER -->
            <form id="registerForm" method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="input-group">
                    <span class="input-icon">♙</span>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Nama lengkap"
                        autocomplete="name"
                        required>
                </div>

                <div class="input-group">
                    <span class="input-icon">✉</span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        autocomplete="email"
                        required>
                </div>

                <div class="input-group">
                    <span class="input-icon">♟</span>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Username"
                        autocomplete="username"
                        minlength="4"
                        required>
                </div>

                <div class="input-group">
                    <span class="input-icon">🔒</span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password (minimal 8 karakter)"
                        autocomplete="new-password"
                        minlength="8"
                        required>

                    <button
                        type="button"
                        class="show-password"
                        data-target="password">
                        Lihat
                    </button>
                </div>

                <div class="input-group">
                    <span class="input-icon">🔒</span>

                    <input
                        type="password"
                        id="konfirmasi"
                        name="konfirmasi"
                        placeholder="Konfirmasi password"
                        autocomplete="new-password"
                        minlength="8"
                        required>

                    <button
                        type="button"
                        class="show-password"
                        data-target="konfirmasi">
                        Lihat
                    </button>
                </div>

                <!-- SYARAT DAN KETENTUAN -->
                <div class="terms">
                    <input type="checkbox" id="setuju" required>

                    <label for="setuju">
                        Saya menyetujui syarat dan ketentuan penggunaan TOUGAR.
                    </label>
                </div>

                <!-- TOMBOL DAFTAR -->
                <button type="submit" class="submit-button">
                    Daftar Sekarang
                </button>

            </form>

            <!-- LINK LOGIN -->
            <p class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">Masuk sekarang</a>
            </p>

            <!-- PESAN VALIDASI -->
            <p id="message" class="message{{ $errors->any() ? ' error' : '' }}" aria-live="polite">{{ $errors->first() }}</p>

        </div>
    </div>

    
@endsection

@push('scripts')
    <script>
        const registerForm = document.getElementById("registerForm");
        const message = document.getElementById("message");

        // FITUR TAMPILKAN PASSWORD
        document.querySelectorAll(".show-password").forEach(button => {
            button.addEventListener("click", function () {
                const input = document.getElementById(this.dataset.target);
                if (input.type === "password") {
                    input.type = "text";
                    this.textContent = "Sembunyi";
                } else {
                    input.type = "password";
                    this.textContent = "Lihat";
                }
            });
        });

        // VALIDASI SISI BROWSER (validasi lengkap tetap dilakukan server)
        registerForm.addEventListener("submit", function (event) {
            const password = document.getElementById("password").value;
            const konfirmasi = document.getElementById("konfirmasi").value;

            if (password !== konfirmasi) {
                event.preventDefault();
                message.textContent = "Password dan konfirmasi password tidak sama.";
                message.className = "message error";
                document.getElementById("konfirmasi").focus();
            }
        });
    </script>
@endpush

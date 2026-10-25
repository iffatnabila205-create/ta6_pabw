@extends('layouts.app')

@section('title', 'Lupa Password | TOUGAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/lupa-password.css') }}">
@endpush

@section('content')
<div class="container">

<div class="left-panel">
    <div class="overlay">
        <h1>TOUGAR</h1>
        <p>Smart Tourism Garut</p>
    </div>
</div>

<div class="right-panel">

    <h1>Lupa Password</h1>

    <p>
        Masukkan email yang terdaftar untuk
        menerima link reset password.
    </p>

    <form id="forgotForm">

        <div class="input-group">
            <input type="email"
            placeholder="Masukkan Email Anda"
            required>
        </div>

        <button class="btn">Kirim Link Reset</button>

    </form>

    <div class="bottom-text">
        <a href="{{ route('login') }}">
            Kembali ke Login
        </a>
    </div>

</div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/lupa-password.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Login Admin - TOUGAR')

@push('styles')
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #006d77 0%, #064e4f 100%);
      padding: 20px;
    }

    .login-container {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.3);
      max-width: 450px;
      width: 100%;
      animation: slideUp 0.5s ease;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .logo-section {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo-section img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 4px solid #006d77;
      margin-bottom: 15px;
      object-fit: cover;
      background: #fff;
    }

    .logo-section h1 {
      color: #006d77;
      font-size: 1.8rem;
      margin-bottom: 5px;
    }

    .logo-section p {
      color: #666;
      font-size: 0.95rem;
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #333;
      font-weight: 500;
      font-size: 0.95rem;
    }

    .input-wrapper {
      position: relative;
    }

    .input-wrapper input {
      width: 100%;
      padding: 15px 45px 15px 15px;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 0.95rem;
      transition: 0.3s;
    }

    .input-wrapper input:focus {
      outline: none;
      border-color: #006d77;
      box-shadow: 0 0 0 4px rgba(0,109,119,0.1);
    }

    .input-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 1.2rem;
      cursor: pointer;
    }

    .password-toggle:hover {
      color: #006d77;
    }

    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.9rem;
      color: #666;
    }

    .remember-me input {
      width: 18px;
      height: 18px;
      cursor: pointer;
    }

    .forgot-password {
      color: #006d77;
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .btn-login {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #006d77, #005560);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0,109,119,0.4);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .back-to-site {
      text-align: center;
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #e5e7eb;
    }

    .back-to-site a {
      color: #006d77;
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .back-to-site a:hover {
      text-decoration: underline;
    }

    .error-message {
      background: #fee2e2;
      color: #991b1b;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.9rem;
      display: none;
      animation: shake 0.5s;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      75% { transform: translateX(10px); }
    }

    .success-message {
      background: #d1fae5;
      color: #065f46;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.9rem;
      display: none;
    }

    .credential-info {
      background: #dbeafe;
      border: 1px solid #3b82f6;
      color: #1e40af;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.85rem;
    }

    .credential-info strong {
      display: block;
      margin-bottom: 8px;
      color: #1e3a8a;
    }

    .credential-info code {
      background: white;
      padding: 2px 6px;
      border-radius: 4px;
      font-family: 'Courier New', monospace;
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 30px 20px;
      }

      .logo-section h1 {
        font-size: 1.5rem;
      }

      .form-options {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
      }
    }
  </style>
@endpush

@section('content')
  <div class="login-container">
    <div class="logo-section">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo TOUGAR">
      <h1>Admin TOUGAR</h1>
      <p>Silakan login untuk melanjutkan</p>
    </div>

    
    <div id="error-message" class="error-message" @if ($errors->any()) style="display:block" @endif>{{ $errors->first() }}</div>
    <div id="success-message" class="success-message"></div>

    <form id="login-form" method="POST" action="{{ route('admin.login.attempt') }}">
      @csrf
      <div class="form-group">
        <label>Username</label>
        <div class="input-wrapper">
          <input 
            type="text" 
            id="username" 
            name="username" value="{{ old('username') }}"
            placeholder="Masukkan username" 
            required
          >
          <span class="input-icon">👤</span>
        </div>
      </div>

      <div class="form-group">
        <label>Password</label>
        <div class="input-wrapper">
          <input 
            type="password" 
            id="password" 
            name="password"
            placeholder="Masukkan password" 
            required
          >
          <span class="input-icon password-toggle" onclick="togglePassword()">👁️</span>
        </div>
      </div>

      <div class="form-options">
        <label class="remember-me">
          <input type="checkbox" id="remember" name="remember" value="1">
          <span>Ingat saya</span>
        </label>
        <a href="#" class="forgot-password">Lupa password?</a>
      </div>

      <button type="submit" class="btn-login">Login</button>
    </form>

    <div class="back-to-site">
      <a href="{{ route('landing') }}">
        <span>🏠</span> Kembali ke Website
      </a>
    </div>
  </div>

  
@endsection

@push('scripts')
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        document.querySelector('.forgot-password').addEventListener('click', function (e) {
            e.preventDefault();
            alert('📧 Silakan hubungi administrator untuk reset password:\n\n✉️ Email: admin@tougar.com\n📱 WhatsApp: +62 812-3456-7890');
        });
    </script>
@endpush

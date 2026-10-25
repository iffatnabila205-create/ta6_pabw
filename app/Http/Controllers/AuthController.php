<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username dan Password wajib diisi!',
            'password.required' => 'Username dan Password wajib diisi!',
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['username' => 'Username atau password salah!']);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('beranda'))
            ->with('status', 'Login berhasil! Selamat datang di TOUGAR');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'username' => ['required', 'string', 'min:4', 'max:50', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8'],
            'konfirmasi' => ['required', 'same:password'],
        ], [
            'konfirmasi.same' => 'Password dan konfirmasi password tidak sama.',
            'username.unique' => 'Username sudah dipakai.',
            'email.unique' => 'Email sudah terdaftar.',
        ]);

        User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password'],
        ]);

        return redirect()->route('login')
            ->with('status', 'Pendaftaran berhasil! Silakan login.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $credentials['username'] = strtolower(trim($credentials['username']));

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['username' => 'Username atau password salah! Periksa kembali kredensial Anda.']);
        }

        if (! Auth::user()->is_admin) {
            Auth::logout();

            return back()
                ->withInput($request->only('username'))
                ->withErrors(['username' => 'Akun ini tidak memiliki akses admin.']);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('status', 'Login berhasil!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}

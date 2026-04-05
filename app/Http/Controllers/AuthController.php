<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    // 1. Menampilkan form halaman login [cite: 3]
    public function login()
    {
        return view('login');
    }

    // 2. Memproses data dari form login [cite: 4]
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mengecek apakah user ada di DB dengan middleware Auth [cite: 4]
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Jika berhasil login, redirect ke halaman home [cite: 5]
            return redirect()->intended('/home');
        }

        // Jika email/password tidak ada atau salah, kembalikan dengan pesan error [cite: 17, 29]
        return back()->with('error', 'Email / password salah');
    }

    // 3. Menampilkan form halaman registrasi [cite: 6]
    public function registration()
    {
        return view('registration');
    }

    // 4. Memproses input registrasi dan menyimpan ke DB [cite: 7]
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        // Enkripsi password sebelum disimpan
        $validated['password'] = Hash::make($validated['password']);

        // Insert data user ke DB [cite: 7]
        User::create($validated);

        // Redirect kembali ke halaman registration dengan pesan sukses [cite: 7, 52]
        return redirect('/registration')->with('success', 'Registrasi berhasil');
    }

    // 5. Menampilkan halaman home [cite: 8]
    public function home()
    {
        // Jika user belum login, redirect paksa ke halaman login [cite: 9]
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Jika sudah login, tampilkan halaman home [cite: 8]
        return view('home', ['user' => Auth::user()]);
    }

    // 6. Proses logout [cite: 10]
    public function logout(Request $request)
    {
        // Pemanggilan logout menggunakan library Auth [cite: 10]
        Auth::logout(); 
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect kembali ke halaman login [cite: 10]
        return redirect('/login'); 
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function index()
    {
        return view('auth.login');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nomor_induk' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = $request->input('nomor_induk');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nomor_induk';

        if (Auth::attempt([$fieldType => $login, 'password' => $request->password])) {
            $request->session()->regenerate();
            $role = auth()->user()->role;

            switch ($role) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'dosen':
                    return redirect('/dosen/dashboard');
                case 'mahasiswa':
                    return redirect('/mahasiswa/dashboard');
                default:
                    auth()->logout();
                    abort(403, 'Unauthorized role.');
            }
        }

        return back()->withErrors([
            'nomor_induk' => 'Login gagal. Nomor Induk atau Password salah.',
        ])->withInput();
    }


    // Menampilkan form registrasi
    public function create()
    {
        return view('auth.register');
    }

    // Menangani proses registrasi
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_induk' => 'required|string|unique:users,nomor_induk',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|in:mahasiswa,dosen', // hanya izinkan 2 role ini lewat form
        ]);

        $user = User::create([
            'name' => $request->name,
            'nomor_induk' => $request->nomor_induk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

    }


    // Menangani proses logout
    public function logout(Request $request)
    {
        // Logout pengguna saat ini
        Auth::logout();

        // Membuat session menjadi tidak valid
        $request->session()->invalidate();

        // Membuat ulang token CSRF
        $request->session()->regenerateToken();

        // Mengarahkan pengguna ke halaman utama
        return redirect('/');
    }

}

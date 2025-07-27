<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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

}

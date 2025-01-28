<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('account.login');
    }

    public function register()
    {
        return view('account.registrasi');
    }

    public function loginProcess(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari user berdasarkan email
        $user = User::where('email', $request->input('email'))->first();

        // Cek password
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Login sukses
            Auth::login($user);
            return redirect()->intended(route('tampilPegawai'));
        } else {
            // Login gagal
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function registerProcess(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat user baru
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        // Login sukses
        Auth::login($user);
        return redirect()->intended(route('tampilPegawai'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

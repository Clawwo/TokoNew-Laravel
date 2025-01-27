<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function registerProcess(Request $request)
    {
        $username = htmlspecialchars($request->input('username'));
        $email = htmlspecialchars($request->input('email'));
        $password = htmlspecialchars($request->input('password'));

        $HashedPass = Hash::make($password);

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = $HashedPass;
        $user->role = 'Pegawai';
        $user->save();

        return redirect('/admin/pegawai');
    }

    public function registerPegawai()
    {
        return view('account.registrasi');
    }

    function loginProcess(Request $request)
    {
        $email = htmlspecialchars($request->input('email'));
        $password = htmlspecialchars($request->input('password'));

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            if ($user->role == 'Admin') {
                return redirect('/admin/pelanggan');
            } elseif ($user->role == 'Pegawai') {
                return redirect('/admin/pegawai');
            }
        }

        return redirect('/login')->with('error', 'Username atau password salah');
    }

    public function login()
    {
        return view('account.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}

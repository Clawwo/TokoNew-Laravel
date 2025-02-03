<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;

class HomeController extends Controller
{
    public function TambahPelangganproces(Request $request)
    {
        $nama = $request->input('nama');
        $gender = $request->input('gender');

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $nama;
        $pelanggan->gender = $gender;
        $pelanggan->save();

        return redirect()->route('tampilPelanggan')->with('success', 'Data berhasil disimpan');
    }

    public function tambahPelanggan()
    {
        return view('kasir.add.tambahpelanggan');
    }

    public function tampilPelanggan()
    {
        $pelanggan = Pelanggan::all();
        $total_pelanggan = $pelanggan->count();

        return view('kasir.pelanggan', compact('pelanggan', 'total_pelanggan'));
    }

    public function hapusPelanggan($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->delete();

        return redirect()->route('tampilPelanggan')->with('success', 'Data pegawai berhasil dihapus');
    }

    public function tampilPegawai()
    {
        $pegawai = User::all();
        $total_pegawai = $pegawai->count();

        return view('kasir.pegawai', compact('pegawai', 'total_pegawai'));
    }

    public function tambahPegawai()
    {
        return view('kasir.add.tambahpegawai');
    }

    public function tambahPegawaiProces(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        $pegawai = new User();
        $pegawai->username = $username;
        $pegawai->email = $email;
        $pegawai->password = $password;
        $pegawai->role = 'pegawai';
        $pegawai->save();

        return redirect()->route('tampilPegawai')->with('success', 'Data berhasil disimpan');
    }

    public function hapusPegawai($id_user)
    {
        $pegawai = User::findOrFail($id_user);
        $pegawai->delete();

        return redirect()->route('tampilPegawai')->with('success', 'Data pegawai berhasil dihapus');
    }
}

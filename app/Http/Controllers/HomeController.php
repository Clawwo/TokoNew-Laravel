<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;

class HomeController extends Controller
{
    public function TambahPelangganproces(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|string|unique:pelanggan,id_pelanggan',
            'nama' => 'required|string',
            'gender' => 'required|string',
        ]);

        $id_pelanggan = $request->input('id_pelanggan');
        $nama = $request->input('nama');
        $gender = $request->input('gender');

        $pelanggan = new Pelanggan();
        $pelanggan->id_pelanggan = $id_pelanggan;
        $pelanggan->nama = $nama;
        $pelanggan->gender = $gender;
        $pelanggan->save();

        return redirect()->route('tampilPelanggan')->with('success', 'Data berhasil disimpan');
    }

    public function tambahPelanggan()
    {
        return view('kasir.add.tambahpelanggan');
    }

    public function editPelanggan($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        return view('kasir/add/editpelanggan', compact('pelanggan'));
    }

    public function updatePelanggan(Request $request, $id_pelanggan)
    {
        $request->validate([
            'id_pelanggan' => 'required|string',
            'nama' => 'required|string',
            'gender' => 'required|string',
        ]);

        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->id_pelanggan = $request->input('id_pelanggan');
        $pelanggan->nama = $request->input('nama');
        $pelanggan->gender = $request->input('gender');
        $pelanggan->save();

        return redirect()->route('tampilPelanggan')->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function tampilPelanggan(Request $request)
    {
        $search = $request->input('search');

        $query = Pelanggan::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('id_pelanggan', 'LIKE', "%{$search}%")
                    ->orWhere('gender', 'LIKE', "%{$search}%");
            });
        }

        $pelanggan = $query->get();
        $total_pelanggan = $pelanggan->count();

        return view('kasir.pelanggan', compact('pelanggan', 'total_pelanggan'));
    }

    public function hapusPelanggan($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->delete();

        return redirect()->route('tampilPelanggan')->with('success', 'Data pelanggan berhasil dihapus');
    }

    public function tampilPegawai(Request $request)
    {
        $search = $request->input('search');

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('role', 'LIKE', "%{$search}%");
            });
        }

        $pegawai = $query->get();
        $total_pegawai = $pegawai->count();

        return view('kasir.pegawai', compact('pegawai', 'total_pegawai'));
    }

    public function tambahPegawai()
    {
        return view('kasir.add.tambahpegawai');
    }

    public function editPegawai($id_user)
    {
        $pegawai = User::findOrFail($id_user);
        return view('kasir.add.editpegawai', compact('pegawai'));
    }

    public function updatePegawai(Request $request, $id_user)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string',
        ]);

        $pegawai = User::findOrFail($id_user);
        $pegawai->username = $request->input('username');
        $pegawai->email = $request->input('email');
        $pegawai->role = $request->input('role');
        $pegawai->save();

        return redirect()->route('tampilPegawai')->with('success', 'Data pegawai berhasil diperbarui');
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

        return redirect()->route('tampilPegawai')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    public function hapusPegawai($id_user)
    {
        $pegawai = User::findOrFail($id_user);
        $pegawai->delete();

        return redirect()->route('tampilPegawai')->with('success', 'Data pegawai berhasil dihapus');
    }
}

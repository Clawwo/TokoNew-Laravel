<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BarangController extends Controller
{
    public function tampilBarang()
    {
        $barang = Barang::all();
        $total_barang = $barang->count();

        return view('kasir.barang', compact('barang', 'total_barang'));
    }

    public function tambahBarang()
    {
        return view('kasir.add.tambahbarang');
    }

    public function tambahBarangproces(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
        } else {
            $imageName = null;
        }

        // Simpan produk ke database
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);

        return redirect()->route('tampilBarang');
    }

    public function editBarang($id)
    {
        $barang = Barang::find($id);
        return view('kasir/add/editbarang', compact('barang'));
    }

    public function updateBarang(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::find($id);

        // Upload gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($barang->image) {
                Storage::delete('public/images/products/' . $barang->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
        } else {
            $imageName = $barang->image;
        }

        // Update produk ke database
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);

        return redirect()->route('tampilBarang');
    }

    public function hapusBarang($id_barang)
    {
        try {
            $barang = Barang::find($id_barang);

            // Hapus gambar jika ada
            if ($barang->image) {
                $imagePath = public_path('images/products/') . $barang->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $barang->delete();
            return redirect()->route('tampilBarang')->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('tampilBarang')->with('error', 'Gagal menghapus produk. Silakan coba lagi.');
        }
    }
}

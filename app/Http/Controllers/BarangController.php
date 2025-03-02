<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BarangController extends Controller
{
    public function tampilBarang(Request $request)
    {
        $search = $request->input('search');

        $query = Barang::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'LIKE', "%{$search}%")
                    ->orWhere('id_barang', 'LIKE', "%{$search}%")
                    ->orWhere('harga_barang', 'LIKE', "%{$search}%")
                    ->orWhere('stock', 'LIKE', "%{$search}%");
            });
        }

        $barang = $query->get();
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

        try {
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

            return redirect()->route('tampilBarang')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk. Silakan coba lagi.');
        }
    }

    public function editBarang($id)
    {
        $barang = Barang::findOrFail($id);
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

        try {
            $barang = Barang::findOrFail($id);

            // Upload gambar
            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if ($barang->image) {
                    $oldImagePath = public_path('images/products/') . $barang->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
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

            return redirect()->route('tampilBarang')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui produk. Silakan coba lagi.');
        }
    }

    public function hapusBarang($id_barang)
    {
        try {
            $barang = Barang::findOrFail($id_barang);

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

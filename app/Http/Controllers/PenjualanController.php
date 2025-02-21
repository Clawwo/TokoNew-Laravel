<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class PenjualanController extends Controller
{
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        return view('kasir.transaksi', compact('pelanggan', 'barang'));
    }

    public function getBarang($id_barang)
    {
        $barang = Barang::find($id_barang);
        return response()->json($barang);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Cek apakah pelanggan terdaftar
            $pelanggan = Pelanggan::find($request->id_pelanggan);
            $isMember = $pelanggan ? true : false;

            // Simpan transaksi
            $penjualan = Penjualan::create([
                'id_pelanggan' => $request->id_pelanggan,
                'tgl_transaksi' => now(),
                'total_transaksi' => 0, // Akan diperbarui nanti
            ]);

            $totalHarga = 0;

            foreach ($request->barang as $item) {
                $barang = Barang::find($item['id_barang']);

                if ($barang) {
                    $subtotal = $barang->harga_barang * $item['jml_barang'];
                    $totalHarga += $subtotal;

                    // Simpan detail penjualan
                    DetailPenjualan::create([
                        'id_transaksi' => $penjualan->id_transaksi,
                        'id_barang' => $barang->id_barang,
                        'jml_barang' => $item['jml_barang'],
                        'harga_satuan' => $barang->harga_barang,
                    ]);
                }
            }



            // Jika pelanggan terdaftar, berikan diskon 10%
            $diskon = $isMember ? ($totalHarga * 0.1) : 0;
            $totalAkhir = $totalHarga - $diskon;

            // Update total transaksi
            $penjualan->update(['total_transaksi' => $totalAkhir]);

            DB::commit();

            return redirect()->route('transaksi.create')->with([
                'success' => 'Rp. ' . number_format($totalAkhir, 2) . ($isMember ? ' (Diskon 10%)' : ' '),
                'tanggal_transaksi' => $penjualan->tgl_transaksi->format('d F Y'),
                'items' => collect($request->barang)->map(function ($item) {
                    $barang = Barang::find($item['id_barang']);
                    return [
                        'nama_barang' => $barang->nama_barang,
                        'jumlah' => $item['jml_barang'],
                        'harga_satuan' => $barang->harga_barang,
                        'total_harga' => $barang->harga_barang * $item['jml_barang']
                    ];
                })->toArray()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // public function invoice($id_transaksi)
    // {
    //     $penjualan = Penjualan::find($id_transaksi);
    //     $detailPenjualan = DetailPenjualan::where('id_transaksi', $id_transaksi)->get();

    //     // Buat data invoice
    //     $invoice = [
    //         'penjualan' => $penjualan,
    //         'detailPenjualan' => $detailPenjualan,
    //     ];

    //     // Tampilkan invoice pada halaman transaksi
    //     return view('kasir.transaksi', compact('invoice'));
    // }

    public function riwayatInvoice()
    {
        $penjualan = Penjualan::with(['pelanggan'])->get();

        return view('kasir.riwayat_invoice', compact('penjualan'));
    }
}

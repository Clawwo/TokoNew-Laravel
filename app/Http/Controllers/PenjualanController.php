<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    // Menampilkan form transaksi
    public function tambahTransaksi()
    {
        return view('kasir.transaksi');
    }

    // Menyimpan transaksi
    public function simpanTransaksi(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'tgl_transaksi' => 'required|date',
            'items' => 'required|array',
            'items.*.id_barang' => 'required|exists:barang,id_barang',
            'items.*.jml_barang' => 'required|integer|min:1',
            'items.*.harga_satuan' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Hitung total transaksi
            $totalTransaksi = collect($request->items)->sum(function ($item) {
                return $item['jml_barang'] * $item['harga_satuan'];
            });

            // Simpan data penjualan
            $penjualan = Penjualan::create([
                'id_pelanggan' => $request->id_pelanggan,
                'tgl_transaksi' => $request->tgl_transaksi,
                'total_transaksi' => $totalTransaksi,
            ]);

            // Simpan detail penjualan
            foreach ($request->items as $item) {
                DetailPenjualan::create([
                    'id_transaksi' => $penjualan->id_transaksi,
                    'id_barang' => $item['id_barang'],
                    'jml_barang' => $item['jml_barang'],
                    'harga_satuan' => $item['harga_satuan'],
                ]);
            }

            DB::commit();

            return redirect()->route('invoice', $penjualan->id_transaksi)->with('success', 'Transaksi berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Transaksi gagal: ' . $e->getMessage());
        }
    }

    // Generate Invoice
    // public function invoice($id_transaksi)
    // {
    //     $penjualan = Penjualan::with('detailPenjualan')->findOrFail($id_transaksi);
    //     $pdf = Pdf::loadView('invoice', compact('penjualan'));
    //     return $pdf->download('invoice-' . $penjualan->id_transaksi . '.pdf');
    // }
}

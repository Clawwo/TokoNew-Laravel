<?php

namespace App\Traits;

use App\Models\Penjualan;

trait PenjualanTrait
{
    public function getPenjualanData()
    {
        return Penjualan::with(['detailPenjualan.barang', 'pelanggan'])->get();
    }
}

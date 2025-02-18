<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id_transaksi_detail';
    protected $fillable = ['id_transaksi', 'id_barang', 'jml_barang', 'harga_satuan'];

    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class, 'id_transaksi', 'id_transaksi');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function hitungSubtotal() {
        return $this->harga_satuan * $this->jml_barang;
    }
}

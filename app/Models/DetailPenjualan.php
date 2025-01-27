<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id_transaksi_detail';
    protected $fillable = ['id_transaksi', 'id_barang', 'jml_barang', 'harga_satuan'];
}

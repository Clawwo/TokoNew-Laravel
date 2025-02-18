<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_pelanggan', 'tgl_transaksi', 'total_transaksi'];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_transaksi', 'id_transaksi');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}

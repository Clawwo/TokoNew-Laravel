<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_pelanggan', 'tgl_transaksi', 'total_transaksi'];
}

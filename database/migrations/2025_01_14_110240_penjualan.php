<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->integer('id_pelanggan');
            $table->date('tgl_transaksi');
            $table->integer('total_transaksi');
            $table->timestamps();
        });

        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->increments('id_transaksi_detail');
            $table->integer('id_transaksi');
            $table->integer('id_barang');
            $table->integer('jml_barang');
            $table->integer('harga_satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('detail_penjualan');
    }
};



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
            $table->unsignedInteger('id_pelanggan');
            $table->date('tgl_transaksi');
            $table->decimal('total_transaksi', 10, 2);
            $table->timestamps();
        });

        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->increments('id_transaksi_detail');
            $table->unsignedInteger('id_transaksi');
            $table->unsignedInteger('id_barang');
            $table->integer('jml_barang');
            $table->decimal('harga_satuan', 10, 2);
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id_transaksi')->on('penjualan')->onDelete('cascade');
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



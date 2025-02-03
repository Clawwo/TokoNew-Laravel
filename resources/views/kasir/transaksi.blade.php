@extends('layouts.main')

@section('content')
    @include('components.sidebar')
    <div class="sm:ml-64">
        <div class="container mt-5">
            <h1 class="mb-4">Buat Transaksi Baru</h1>

            <!-- Form Transaksi -->
            <form action="{{ route('simpanTransaksi') }}" method="POST">
                @csrf

                <!-- Input Pelanggan -->
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                </div>

                <!-- Input Tanggal Transaksi -->
                <div class="mb-3">
                    <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required>
                </div>

                <!-- Detail Barang -->
                <div class="mb-3">
                    <h4>Detail Barang</h4>
                    <div id="items-container">
                        <!-- Baris pertama untuk input barang -->
                        <div class="mb-3 item-row">
                            <div class="row">
                                <div class="col">
                                    <label for="id_barang" class="form-label">ID Barang</label>
                                    <input type="text" class="form-control" name="items[0][id_barang]" required>
                                </div>
                                <div class="col">
                                    <label for="jml_barang" class="form-label">Jumlah Barang</label>
                                    <input type="number" class="form-control" name="items[0][jml_barang]" required>
                                </div>
                                <div class="col">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <input type="number" class="form-control" name="items[0][harga_satuan]" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol untuk menambah barang -->
                    <button type="button" class="btn btn-secondary" id="add-item">Tambah Barang</button>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>
        </div>
    </div>

    <!-- Script untuk menambah barang -->
    <script>
        let itemIndex = 1;

        document.getElementById('add-item').addEventListener('click', function() {
            const container = document.getElementById('items-container');

            const newItemRow = document.createElement('div');
            newItemRow.classList.add('item-row', 'mb-3');

            newItemRow.innerHTML = `
                <div class="row">
                    <div class="col">
                        <label for="id_barang" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" name="items[${itemIndex}][id_barang]" required>
                    </div>
                    <div class="col">
                        <label for="jml_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="items[${itemIndex}][jml_barang]" required>
                    </div>
                    <div class="col">
                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                        <input type="number" class="form-control" name="items[${itemIndex}][harga_satuan]" required>
                    </div>
                </div>
            `;

            container.appendChild(newItemRow);
            itemIndex++;
        });
    </script>
@endsection

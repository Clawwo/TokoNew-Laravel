@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Transaksi Penjualan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('simpanTransaksi') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pelanggan">ID Pelanggan:</label>
            <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control">
            <div id="status-member" class="mt-2"></div>
        </div>

        <div id="barang-container">
            <div class="barang-item">
                <label>ID Barang:</label>
                <input type="text" name="barang[0][id_barang]" class="form-control id-barang">

                <label>Nama Barang:</label>
                <input type="text" class="form-control nama-barang" readonly>

                <label>Harga Satuan:</label>
                <input type="text" class="form-control harga-satuan" readonly>

                <label>Jumlah:</label>
                <input type="number" name="barang[0][jml_barang]" class="form-control jumlah" min="1" value="1">
            </div>
        </div>

        <button type="button" id="add-barang" class="mt-3 btn btn-secondary">Tambah Barang</button>
        <button type="submit" class="mt-3 btn btn-primary">Simpan Transaksi</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let barangIndex = 1;

        function updateBarangListener() {
            document.querySelectorAll('.id-barang').forEach(input => {
                input.addEventListener('change', function() {
                    let idBarang = this.value;
                    let parent = this.closest('.barang-item');
                    fetch(`/barang/${idBarang}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                parent.querySelector('.nama-barang').value = data.nama_barang;
                                parent.querySelector('.harga-satuan').value = data.harga_barang;
                            } else {
                                parent.querySelector('.nama-barang').value = '';
                                parent.querySelector('.harga-satuan').value = '';
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        }

        document.getElementById('add-barang').addEventListener('click', function() {
            let container = document.getElementById('barang-container');
            let newItem = document.createElement('div');
            newItem.classList.add('barang-item');
            newItem.innerHTML = `
                <label>ID Barang:</label>
                <input type="text" name="barang[${barangIndex}][id_barang]" class="form-control id-barang">

                <label>Nama Barang:</label>
                <input type="text" class="form-control nama-barang" readonly>

                <label>Harga Satuan:</label>
                <input type="text" class="form-control harga-satuan" readonly>

                <label>Jumlah:</label>
                <input type="number" name="barang[${barangIndex}][jml_barang]" class="form-control jumlah" min="1" value="1">
            `;
            container.appendChild(newItem);
            updateBarangListener();
            barangIndex++;
        });

        updateBarangListener();

        // Cek status pelanggan saat ID dimasukkan
        document.getElementById('id_pelanggan').addEventListener('change', function() {
            let idPelanggan = this.value;
            fetch(`/cek-pelanggan/${idPelanggan}`)
                .then(response => response.json())
                .then(data => {
                    let statusDiv = document.getElementById('status-member');
                    if (data.status === 'member') {
                        statusDiv.innerHTML = '<span class="text-success">Pelanggan Terdaftar (Mendapat Diskon)</span>';
                    } else {
                        statusDiv.innerHTML = '<span class="text-danger">Pelanggan Tidak Terdaftar (Tanpa Diskon)</span>';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection

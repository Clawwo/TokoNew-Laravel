@extends('layouts.main')

@section('content')
    @include('components.sidebar')
    <div class="p-6 sm:ml-64 ">
        <div
            class="container p-6 mx-auto text-gray-800 border rounded-lg shadow-md dark:bg-neutral-800 dark:border-neutral-700">
            <h2 class="mb-4 text-2xl font-semibold dark:text-neutral-200">Transaksi Penjualan</h2>

            @if (session('success'))
                <div class="p-3 mb-4 bg-green-500 rounded dark:text-neutral-200">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="p-3 mb-4 bg-red-500 rounded dark:text-neutral-200">{{ session('error') }}</div>
            @endif

            <form action="{{ route('simpanTransaksi') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-3 font-medium text-gray-800 dark:text-neutral-200">ID Pelanggan</label>
                        <input type="text" name="id_pelanggan" id="id_pelanggan"
                            class="w-full p-2 border rounded dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:focus:ring-neutral-600"
                            autocomplete="off">
                        <div id="status-member" class="mt-2 text-sm"></div>
                    </div>
                </div>

                <div id="barang-container" class="space-y-4">
                    <div
                        class="grid items-center grid-cols-5 gap-4 p-4 border rounded barang-item dark:bg-neutral-800 dark:border-neutral-700">
                        <input type="text" name="barang[0][id_barang]"
                            class="p-2 border id-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                            placeholder="ID Barang" autocomplete="off" required>
                        <input type="text"
                            class="p-2 border nama-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                            placeholder="Nama Barang" readonly>
                        <input type="text"
                            class="p-2 border harga-satuan dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                            placeholder="Harga Satuan" readonly>
                        <input type="number" name="barang[0][jml_barang]"
                            class="p-2 border jumlah dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                            min="1" value="1">
                        <h3 class="font-semibold text-right subtotal dark:text-neutral-200">Rp. 0</h3>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div>
                        <button type="button" id="add-barang"
                            class="px-4 py-2 mr-4 text-white bg-blue-600 rounded hover:bg-blue-700">Tambah
                            Barang</button>
                        <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded">Simpan Transaksi</button>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold dark:text-neutral-200">Total Harga: <span id="total-harga">Rp.
                            0</span></h3>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let barangIndex = 1;

            function formatRupiah(angka) {
                return `Rp. ${angka.toLocaleString('id-ID')}`;
            }

            function updateBarangListener() {
                document.querySelectorAll('.id-barang').forEach(input => {
                    input.addEventListener('change', function() {
                        let idBarang = this.value;
                        let parent = this.closest('.barang-item');
                        fetch(`/barang/${idBarang}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data) {
                                    parent.querySelector('.nama-barang').value = data
                                        .nama_barang;
                                    parent.querySelector('.harga-satuan').value = formatRupiah(
                                        data.harga_barang);
                                    parent.querySelector('.harga-satuan').setAttribute(
                                        'data-harga', data.harga_barang);
                                    parent.querySelector('.jumlah').setAttribute('max', data
                                        .stock); // Set max to available stock
                                    updateSubtotal(parent);
                                } else {
                                    parent.querySelector('.nama-barang').value = '';
                                    parent.querySelector('.harga-satuan').value = '';
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });
                document.querySelectorAll('.jumlah').forEach(input => {
                    input.addEventListener('input', function() {
                        let parent = this.closest('.barang-item');
                        updateSubtotal(parent);
                    });
                });
            }

            function updateSubtotal(parent) {
                let harga = parseFloat(parent.querySelector('.harga-satuan').getAttribute('data-harga')) || 0;
                let jumlah = parseInt(parent.querySelector('.jumlah').value) || 1;
                let subtotal = harga * jumlah;
                parent.querySelector('.subtotal').textContent = formatRupiah(subtotal);
                updateTotalHarga();
            }

            function updateTotalHarga() {
                let total = 0;
                document.querySelectorAll('.subtotal').forEach(subtotal => {
                    // Mengambil angka dari teks, menghapus simbol "Rp." dan koma
                    let subtotalValue = subtotal.textContent.replace('Rp. ', '').replace(/\./g, '').replace(
                        /,/g, '');
                    total += parseFloat(subtotalValue) || 0; // Menambahkan subtotal yang sudah dibersihkan
                });
                document.getElementById('total-harga').textContent = formatRupiah(total);
            }

            document.getElementById('add-barang').addEventListener('click', function() {
                let container = document.getElementById('barang-container');
                let newItem = document.createElement('div');
                newItem.classList.add('grid', 'grid-cols-5', 'gap-4', 'items-center', 'barang-item',
                    'bg-neutral-800', 'p-4', 'rounded', 'border', 'dark:border-neutral-700');
                newItem.innerHTML = `
            <input type="text" name="barang[${barangIndex}][id_barang]" class="p-2 border id-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="ID Barang" autocomplete="off">
            <input type="text" class="p-2 border nama-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="Nama Barang" readonly>
            <input type="text" class="p-2 border harga-satuan dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="Harga Satuan" readonly data-harga="0">
            <input type="number" name="barang[${barangIndex}][jml_barang]" class="p-2 border jumlah dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" min="1" value="1">
            <h3 class="font-semibold text-right subtotal dark:text-neutral-200"></h3>
        `;
                container.appendChild(newItem);
                updateBarangListener();
                barangIndex++;
            });

            updateBarangListener();

            document.getElementById('id_pelanggan').addEventListener('change', function() {
                let idPelanggan = this.value;
                fetch(`/cek-pelanggan/${idPelanggan}`)
                    .then(response => response.json())
                    .then(data => {
                        let statusDiv = document.getElementById('status-member');
                        if (data.status === 'member') {
                            statusDiv.innerHTML =
                                '<span class="text-green-500">Pelanggan Terdaftar (Mendapat Diskon)</span>';
                        } else {
                            statusDiv.innerHTML =
                                '<span class="text-red-500">Pelanggan Tidak Terdaftar (Tanpa Diskon)</span>';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection

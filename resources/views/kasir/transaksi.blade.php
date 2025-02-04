@extends('layouts.main')

@section('content')
    @include('components.sidebar')
    <div class="sm:ml-64">
        <div class="container p-6 mx-auto dark:bg-gray-80 dark:border-gray-700">
            <!-- Form Transaksi -->
            <form action="{{ route('simpanTransaksi') }}" method="POST" class="p-6 bg-white rounded-lg shadow-md">
                @csrf

                <!-- Input Pelanggan -->
                <div class="mb-6">
                    <label for="id_pelanggan" class="block text-sm font-medium text-gray-700">ID Pelanggan</label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" required
                           class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Detail Barang -->
                <div class="mb-6">
                    <h4 class="mb-4 text-xl font-semibold text-gray-800">Detail Barang</h4>
                    <div id="items-container" class="space-y-4">
                        <!-- Baris pertama untuk input barang -->
                        <div class="p-4 rounded-lg shadow-sm item-row bg-gray-50">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div>
                                    <label for="id_barang" class="block text-sm font-medium text-gray-700">ID Barang</label>
                                    <input type="text" name="items[0][id_barang]" required
                                           class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                                    <input type="text" name="items[0][nama_barang]" required
                                           class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga</label>
                                    <input type="number" name="items[0][harga_satuan]" required
                                           class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="jml_barang" class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
                                    <input type="number" name="items[0][jml_barang]" required
                                           class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Tombol untuk menambah barang -->
                    <button type="button" id="add-item" class="w-full px-4 py-2 mt-4 text-white bg-indigo-600 rounded-md md:w-auto hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Tambah Barang
                    </button>
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk menambah barang -->
    <script>
        let itemIndex = 1;

        document.getElementById('add-item').addEventListener('click', function() {
            const container = document.getElementById('items-container');

            const newItemRow = document.createElement('div');
            newItemRow.classList.add('item-row', 'bg-gray-50', 'p-4', 'rounded-lg', 'shadow-sm', 'mt-4');

            newItemRow.innerHTML = `
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div>
                        <label for="id_barang" class="block text-sm font-medium text-gray-700">ID Barang</label>
                        <input type="text" name="items[${itemIndex}][id_barang]"
                               class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="jml_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="number" name="items[${itemIndex}][nama_barang]"
                               class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                        <input type="number" name="items[${itemIndex}][harga_satuan]"
                               class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="jml_barang" class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
                        <input type="number" name="items[${itemIndex}][jml_barang]"
                               class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
            `;

            container.appendChild(newItemRow);
            itemIndex++;
        });
    </script>
@endsection

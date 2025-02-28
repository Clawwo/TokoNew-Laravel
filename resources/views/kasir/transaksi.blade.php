@extends('layouts.main')

@section('content')
    @include('components.invoice')
    @include('components.sidebar')
    <div class="p-6 sm:ml-64 ">
        <div
            class="container p-6 mx-auto text-gray-800 border rounded-lg shadow-md dark:bg-neutral-800 dark:border-neutral-700">


            <div class="flex items-center justify-between">
                <h2 class="mb-4 text-2xl font-semibold dark:text-neutral-200">Transaksi Penjualan</h2>

                <div class="text-center">
                    <button type="button"
                        class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-ai-modal"
                        data-hs-overlay="#hs-ai-modal">
                        Open Invoice
                    </button>
                </div>
            </div>

            @if (session('error'))
                <div class="p-3 mb-4 bg-red-500 rounded dark:text-neutral-200">{{ session('error') }}</div>
            @endif

            <form id="transaksiForm" action="{{ route('simpanTransaksi') }}" method="POST">
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
                        <button type="button" class="px-4 py-2 text-white bg-green-600 rounded" id="submitTransaksi"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-ai-modal"
                            data-hs-overlay="#hs-ai-modal">Simpan
                            Transaksi</button>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold dark:text-neutral-200">Total Harga: <span id="total-harga">Rp.
                            0</span></h3>
                </div>
            </form>


        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
    @include('components.invoice')
    @include('components.sidebar')

    <div class="p-6 sm:ml-64 ">
        <div
            class="container p-6 mx-auto text-gray-800 border rounded-lg shadow-md dark:bg-neutral-800 dark:border-neutral-700">


            <div class="flex items-center justify-between mb-6">
                <h2 class="mb-4 text-2xl font-semibold dark:text-neutral-200">Transaction Item</h2>

                <div class="text-center">
                    <button type="button"
                        class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-ai-modal"
                        data-hs-overlay="#hs-ai-modal">
                        <i class="fas fa-file-invoice"></i> Open Invoice
                    </button>
                </div>
            </div>

            @if (session('error'))
                <div class="p-3 mb-4 bg-red-500 rounded dark:text-neutral-200">{{ session('error') }}</div>
            @endif

            <form id="transaksiForm" action="{{ route('simpanTransaksi') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4 mb-4">
                    <div class="flex gap-4">
                        <div class="flex-1">

                            <div class="relative flex items-center">
                                <i class="absolute text-gray-500 fas fa-user left-3"></i>
                                <input type="text" name="id_pelanggan" id="id_pelanggan"
                                    class="w-full p-2 pl-10 border rounded dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:focus:ring-neutral-600"
                                    autocomplete="off" placeholder="ID Customer">
                            </div>
                            <div id="status-member" class="mt-2 text-sm"></div>
                        </div>
                        <div class="flex-1">

                            <div class="relative flex items-center">
                                <i class="absolute text-gray-500 fas fa-user left-3"></i>
                                <input type="text" id="nama_pelanggan"
                                    class="w-full p-2 pl-10 border rounded dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200"
                                    readonly placeholder="Customer Name">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="barang-container" class="space-y-4">
                    <div
                        class="flex items-center gap-4 p-4 border rounded barang-item dark:bg-neutral-800 dark:border-neutral-700">
                        <div class="relative flex items-center">
                            <i class="absolute text-gray-500 fas fa-barcode left-3"></i>
                            <input type="text" name="barang[0][id_barang]"
                                class="p-2 pl-10 border id-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                placeholder="ID Item" autocomplete="off" required>
                        </div>
                        <div class="relative flex items-center">
                            <i class="absolute text-gray-500 fas fa-box left-3"></i>
                            <input type="text"
                                class="p-2 pl-10 border nama-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                placeholder="Item Name" readonly>
                        </div>
                        <div class="relative flex items-center">
                            <i class="absolute text-gray-500 fas fa-tag left-3"></i>
                            <input type="text"
                                class="w-full p-2 pl-10 border harga-satuan dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                placeholder="Unit Price" readonly>
                        </div>
                        <div class="relative flex items-center">
                            <i class="absolute text-gray-500 fas fa-sort-numeric-up left-3"></i>
                            <input type="number" name="barang[0][jml_barang]"
                                class="p-2 pl-10 border jumlah dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                min="1" value="1">
                        </div>
                        <div class="ml-auto">
                            <h3 class="font-semibold text-right dark:text-neutral-200 subtotal">Rp. 0</h3>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div>
                        <button type="button" id="add-barang"
                            class="px-4 py-3 mr-4 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                            <i class="mr-1 fas fa-plus"></i> Add Item
                        </button>
                        <button type="button" class="px-4 py-3 text-sm font-medium text-white bg-green-600 rounded"
                            id="submitTransaksi" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-ai-modal"
                            data-hs-overlay="#hs-ai-modal">
                            <i class="mr-1 fas fa-save"></i> Save
                        </button>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold dark:text-neutral-200">Payment amount: <span id="total-harga">Rp.
                            0</span></h3>
                </div>
            </form>


        </div>
    </div>
@endsection

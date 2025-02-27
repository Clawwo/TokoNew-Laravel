@extends('layouts.main')

@section('content')
    @include('components.invoice')
    @include('components.sidebar')
    <div class="p-6 sm:ml-64">
        <div
            class="container p-6 mx-auto text-gray-800 border rounded-lg shadow-md dark:bg-neutral-800 dark:border-neutral-700">

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-semibold dark:text-neutral-200">Transaksi Penjualan</h2>

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
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="relative">
                        <i
                            class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-5 fas fa-user dark:text-neutral-400"></i>
                        <input type="text" name="id_pelanggan" id="id_pelanggan"
                            class="w-full p-2 pl-10 border rounded dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:focus:ring-neutral-600"
                            autocomplete="off" placeholder="ID Pelanggan" required>
                        <div id="status-member" class="mt-2 text-sm"></div>
                    </div>
                </div>

                <div id="barang-container" class="space-y-4">
                    <div
                        class="grid items-center grid-cols-5 gap-4 p-4 border rounded barang-item dark:bg-neutral-800 dark:border-neutral-700">
                        <div class="relative">
                            <i
                                class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2 fas fa-barcode dark:text-neutral-400"></i>
                            <input type="text" name="barang[0][id_barang]"
                                class="w-full p-2 pl-10 border id-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                placeholder="ID Barang" autocomplete="off" required>
                        </div>
                        <div class="relative">
                            <i
                                class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2 fas fa-box dark:text-neutral-400"></i>
                            <input type="text"
                                class="w-full p-2 pl-10 border nama-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                placeholder="Nama Barang" readonly>
                        </div>
                        <div class="relative">
                            <i
                                class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2 fas fa-tag dark:text-neutral-400"></i>
                            <input type="text"
                                class="w-full p-2 pl-10 border harga-satuan dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                placeholder="Harga Satuan" readonly>
                        </div>
                        <div class="relative">
                            <i
                                class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2 fas fa-sort-numeric-up dark:text-neutral-400"></i>
                            <input type="number" name="barang[0][jml_barang]"
                                class="w-full p-2 pl-10 border jumlah dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700"
                                min="1" value="1" required>
                        </div>
                        <h3 class="font-semibold text-right subtotal dark:text-neutral-200">Rp. 0</h3>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex space-x-4">
                        <button type="button" id="add-barang"
                            class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                            <i class="mr-1 fas fa-plus"></i> Tambah Barang
                        </button>
                        <button type="button" class="px-4 py-2 text-white bg-green-600 rounded" id="submitTransaksi">
                            <i class="mr-1 fas fa-save"></i> Simpan Transaksi
                        </button>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold dark:text-neutral-200">Total Harga: <span id="total-harga">Rp.
                            0</span></h3>
                </div>
            </form>

            <!-- Enhanced Smooth Error Alert -->
            <div id="errorAlert"
                class="fixed z-50 hidden p-4 text-white transition-transform duration-300 transform translate-y-4 bg-red-600 rounded-lg shadow-lg opacity-0 bottom-4 right-4">
                <div class="flex items-center">
                    <i class="mr-2 fas fa-exclamation-circle"></i>
                    <p class="text-sm">Please fill in all required fields before saving the transaction.</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('submitTransaksi').addEventListener('click', function() {
            const form = document.getElementById('transaksiForm');
            const requiredFields = form.querySelectorAll('[required]');
            let allFilled = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    allFilled = false;
                }
            });

            if (allFilled) {
                form.submit();
            } else {
                showErrorAlert();
            }
        });

        function showErrorAlert() {
            const alert = document.getElementById('errorAlert');
            alert.classList.remove('hidden', 'translate-y-4', 'opacity-0');
            alert.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                alert.classList.remove('translate-y-0', 'opacity-100');
                alert.classList.add('translate-y-4', 'opacity-0');
                setTimeout(() => alert.classList.add('hidden'), 300);
            }, 3000);
        }
    </script>
@endsection

@extends('layouts.main')

@section('content')
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
            @if (session('success'))
                <!-- Modal -->
                <div id="hs-ai-modal"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none mt-10"
                    role="dialog" tabindex="-1" aria-labelledby="hs-ai-modal-label">
                    <div
                        class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">
                        <div
                            class="relative flex flex-col bg-white shadow-lg pointer-events-auto rounded-xl dark:bg-neutral-800">
                            <div
                                class="relative overflow-hidden text-center bg-gray-900 min-h-32 rounded-t-xl dark:bg-neutral-950">
                                <!-- Close Button -->
                                <div class="absolute top-2 end-2">
                                    <button type="button"
                                        class="inline-flex items-center justify-center text-white border border-transparent rounded-full size-8 gap-x-2 bg-white/10 hover:bg-white/20 focus:outline-none focus:bg-white/20 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-label="Close" data-hs-overlay="#hs-bg-gray-on-hover-cards"
                                        data-hs-remove-element="#hs-ai-modal">
                                        <span class="sr-only">Close</span>
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- End Close Button -->

                                <!-- SVG Background Element -->
                                <figure class="absolute inset-x-0 bottom-0 -mb-px">
                                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        viewBox="0 0 1920 100.1">
                                        <path fill="currentColor" class="fill-white dark:fill-neutral-800"
                                            d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                                    </svg>
                                </figure>
                                <!-- End SVG Background Element -->
                            </div>

                            <div class="relative z-10 -mt-12">
                                <!-- Icon -->
                                <span
                                    class="mx-auto flex justify-center items-center size-[62px] rounded-full border border-gray-200 bg-white text-gray-700 shadow-sm dark:bg-blue-700 dark:border-neutral-700 dark:text-neutral-400">
                                    <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                        <path
                                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </span>
                                <!-- End Icon -->
                            </div>

                            <!-- Body -->
                            <div class="p-4 overflow-y-auto sm:p-7">
                                <div class="text-center">
                                    <h3 id="hs-ai-modal-label"
                                        class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                        Invoice Transaction
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                                        Invoice
                                    </p>
                                </div>

                                <!-- Grid -->
                                <div class="grid grid-cols-2 gap-5 mt-5 sm:mt-10 sm:grid-cols-3" id="barang-container">
                                    <div>
                                        <span
                                            class="block text-xs text-gray-500 uppercase dark:text-neutral-500 barang-item">Amount
                                            paid:</span>
                                        <span
                                            class="block text-sm font-medium text-gray-800 dark:text-neutral-200 subtotal">{{ session('success') }}</span>
                                    </div>
                                    <!-- End Col -->

                                    <div>

                                    </div>
                                    <!-- End Col -->

                                    <div class="ml-5">
                                        <span class="block text-xs text-gray-500 uppercase dark:text-neutral-500">Date
                                            Paid:</span>
                                        <span
                                            class="block text-sm font-medium text-gray-800 dark:text-neutral-200">{{ session('tanggal_transaksi') }}</span>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Grid -->

                                <div class="mt-5 sm:mt-10">
                                    <h4 class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Summary
                                    </h4>

                                    @if (session('items') && count(session('items')) > 0)
                                        <ul class="flex flex-col mt-3">
                                            @foreach (session('items') as $item)
                                                <li
                                                    class="inline-flex items-center px-4 py-3 -mt-px text-sm text-gray-800 border gap-x-2 first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                                    <div class="flex items-center justify-between w-full">
                                                        <span>{{ $item['nama_barang'] }} (x{{ $item['jumlah'] }})</span>
                                                        <span>Rp
                                                            {{ number_format($item['total_harga'], 0, ',') }}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li
                                                class="inline-flex items-center px-4 py-3 -mt-px text-sm font-semibold text-gray-800 border gap-x-2 bg-gray-50 first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200">
                                                <div class="flex items-center justify-between w-full">
                                                    <span>Amount paid</span>
                                                    <span>{{ session('success') }}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                </div>


                                <!-- Button -->
                                <div class="flex justify-end mt-5 gap-x-2">
                                    <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                        href="#" id="pdf" onclick="window.print()">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="7 10 12 15 17 10" />
                                            <line x1="12" x2="12" y1="15" y2="3" />
                                        </svg>
                                        Invoice PDF
                                    </a>
                                </div>
                                <!-- End Buttons -->
                            </div>
                            <!-- End Body -->
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
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
                        <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="hs-ai-modal" data-hs-overlay="#hs-ai-modal"
                            id="open-modal-button">Simpan
                            Transaksi</button>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold dark:text-neutral-200">Total Harga: <span id="total-harga">Rp.
                            0</span></h3>
                </div>
            </form>
        </div>
    </div>
@endsection

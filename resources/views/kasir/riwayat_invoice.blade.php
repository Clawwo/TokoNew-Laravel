@extends('layouts.main')

@section('content')
    @include('components.riwayatinvoice')
    @include('components.sidebar')

    <div class="sm:ml-64" id="laporan">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="overflow-hidden bg-white border border-gray-200 shadow-lg rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                            <!-- Header -->
                            <div
                                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700 bg-gray-50/50 dark:bg-neutral-800">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800 dark:text-neutral-200">
                                        Invoice History
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        View and manage your transaction history and invoices.
                                    </p>
                                </div>

                                <div class="flex flex-col items-center gap-4 sm:flex-row">
                                    <div class="flex items-center px-4 py-2 bg-gray-100 rounded-lg dark:bg-neutral-800">
                                        <span class="text-sm text-gray-600 dark:text-neutral-400">
                                            Total Transactions:
                                            <span
                                                class="ml-1 font-semibold text-gray-900 dark:text-neutral-200">{{ $penjualan->count() }}</span>
                                        </span>
                                    </div>

                                    <a onclick="window.print()"
                                        class="inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg shadow-sm cursor-pointer gap-x-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-md print:hidden">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="7 10 12 15 17 10" />
                                            <line x1="12" x2="12" y1="15" y2="3" />
                                        </svg>
                                        Export PDF
                                    </a>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 print:table print:min-w-full print:divide-y print:divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-neutral-800 print:bg-transparent">
                                    <tr>
                                        <th scope="col" class="px-6 py-3.5 text-left print:px-2 print:py-2 print:pl-20">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200 print:text-black">
                                                Code
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-left print:px-2 print:py-2 print:pl-8">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200 print:text-black">
                                                Date Payment
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-left print:px-2 print:py-2 print:pl-8">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200 print:text-black">
                                                Customer
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-left print:px-2 print:py-2 print:pl-8">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200 print:text-black">
                                                Payment Amount
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-right print:hidden"></th>
                                    </tr>
                                </thead>

                                <tbody
                                    class="divide-y divide-gray-200 dark:divide-neutral-700 print:divide-y print:divide-gray-200">
                                    @foreach ($penjualan as $pnjl)
                                        <tr
                                            class="transition-colors duration-200 hover:bg-gray-50/50 dark:hover:bg-neutral-800/50 print:hover:bg-transparent">
                                            <td
                                                class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-200 print:px-2 print:py-2 print:pl-20 print:text-black">
                                                {{ $pnjl->id_transaksi }}</td>
                                            <td
                                                class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-500 print:px-2 print:py-2 print:pl-8 print:text-black">
                                                {{ Carbon\Carbon::parse($pnjl->tgl_transaksi)->format('d-m-Y') }}</td>
                                            <td
                                                class="px-6 py-3 text-sm text-gray-500 dark:text-white print:px-2 print:py-2 print:pl-8 print:text-black">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium {{ isset($pnjl->pelanggan) ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'bg-gray-100 text-gray-800 dark:bg-gray-600/20 dark:text-gray-400' }} print:bg-transparent print:text-black">
                                                    {{ isset($pnjl->pelanggan) ? $pnjl->pelanggan->nama : 'Umum' }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-3 text-sm text-gray-500 dark:text-white print:px-2 print:py-2 print:pl-8 print:text-black">
                                                Rp.
                                                {{ $pnjl->total_transaksi }}</td>
                                            <td class="px-6 py-3 text-end print:hidden">
                                                <button
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer gap-x-2 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 hover:bg-blue-600 hover:text-white print:hidden btn-view-invoice"
                                                    data-transaction-id="{{ $pnjl->id_transaksi }}" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-modal"
                                                    data-hs-overlay="#hs-ai-modal"type="button">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path
                                                            d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                                                        <polyline points="13 2 13 9 20 9" />
                                                    </svg>
                                                    Invoice
                                                </button>
                                                <form action="{{ route('hapusInvoice', $pnjl->id_transaksi) }}"
                                                    method="POST" class="inline-block print:hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-red-50 dark:bg-transparent dark:border-neutral-700 dark:text-red-300 dark:hover:bg-neutral-800">

                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M3 6h18" />
                                                            <path d="M8 6v14a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V6" />
                                                            <path d="M10 11v6" />
                                                            <path d="M14 11v6" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($penjualan->isEmpty())
                                        <tr>
                                            <td colspan="6" class="px-6 py-12">
                                                <div class="text-center">
                                                    <svg class="w-12 h-12 mx-auto text-gray-400 dark:text-neutral-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <h3
                                                        class="mt-2 text-sm font-semibold text-gray-900 dark:text-neutral-200">
                                                        Tidak ada data Invoice
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-neutral-400">
                                                        {{ request('filterInvoice') ? 'Tidak ada hasil yang cocok dengan pencarian Anda.' : 'Belum ada data invoice yang tersedia.' }}
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>

    <!-- Add SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Add SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.btn-view-invoice').forEach(button => {
            button.addEventListener('click', function() {
                const transactionId = this.getAttribute('data-transaction-id');

                // Ambil data transaksi dari server
                fetch(`/get-transaction/${transactionId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const transaction = data.transaction;

                            // Tampilkan total transaksi
                            const amountPaidElement = document.querySelector('.amount-paid');
                            if (amountPaidElement) {
                                amountPaidElement.textContent =
                                    `Rp. ${transaction.total_transaksi.toLocaleString('id-ID')}`;
                            }

                            // Tampilkan tanggal transaksi
                            const datePaidElement = document.querySelector('.date-paid');
                            if (datePaidElement) {
                                const transactionDate = new Date(transaction.tgl_transaksi);
                                datePaidElement.textContent = transactionDate.toLocaleDateString(
                                    'id-ID', {
                                        day: '2-digit',
                                        month: 'long',
                                        year: 'numeric'
                                    });
                            }

                            // Tampilkan daftar barang
                            const itemList = document.querySelector('.item-list');
                            if (itemList) {
                                itemList.innerHTML = transaction.detail_penjualan.map(detail => `
                            <li class="inline-flex items-center px-4 py-3 -mt-px text-sm text-gray-800 border gap-x-2 first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                <div class="flex items-center justify-between w-full">
                                    <span>${detail.barang.nama_barang} (x${detail.jml_barang})</span>
                                    <span>Rp ${(detail.barang.harga_barang * detail.jml_barang).toLocaleString('id-ID')}</span>
                                </div>
                            </li>
                        `).join('');
                            }

                            // Tampilkan modal
                            const modal = document.querySelector('#hs-ai-modal');
                            if (modal) {
                                modal.classList.remove('hidden');
                                modal.classList.add('hs-overlay-open');
                            }
                        } else {
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan: ' + error.message);
                    });
            });
        });

        

        // Check if there's a success message in the session
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        // Delete confirmation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (this.method.toLowerCase() === 'post' && this.innerHTML.includes('DELETE')) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data invoice akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                }
            });
        });
    </script>
@endsection

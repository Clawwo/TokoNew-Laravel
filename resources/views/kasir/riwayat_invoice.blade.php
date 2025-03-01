@extends('layouts.main')

@section('content')
    @include('components.sidebar')
    @include('components.invoice')

    <div class="sm:ml-64">
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
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Code
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Date Payment
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Customer
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Payment Amount
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3.5 text-right"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($penjualan as $pnjl)
                                        <tr
                                            class="transition-colors duration-200 hover:bg-gray-50/50 dark:hover:bg-neutral-800/50">
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $pnjl->id_transaksi }}</td>
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-500">
                                                {{ Carbon\Carbon::parse($pnjl->tgl_transaksi)->format('d-m-Y') }}</td>
                                            <td class="px-6 py-3 text-sm text-gray-500 dark:text-white">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium {{ isset($pnjl->pelanggan) ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'bg-gray-100 text-gray-800 dark:bg-gray-600/20 dark:text-gray-400' }}">
                                                    {{ isset($pnjl->pelanggan) ? $pnjl->pelanggan->nama : 'Umum' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 text-sm text-gray-500 dark:text-white">Rp.
                                                {{ $pnjl->total_transaksi }}</td>
                                            <td class="px-6 py-3 text-end">
                                                <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer gap-x-2 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 hover:bg-blue-600 hover:text-white print-invoice"
                                                    data-transaction-id="{{ $pnjl->id_transaksi }}" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-modal"
                                                    data-hs-overlay="#hs-ai-modal">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                        <polyline points="7 10 12 15 17 10" />
                                                        <line x1="12" x2="12" y1="15" y2="3" />
                                                    </svg>
                                                    Invoice PDF
                                                </a>
                                                <form action="{{ route('hapusInvoice', $pnjl->id_transaksi) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-red-50 dark:bg-transparent dark:border-neutral-700 dark:text-red-300 dark:hover:bg-neutral-800">

                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M3 6h18" />
                                                            <path d="M8 6v14a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V6" />
                                                            <path d="M10 11v6" />
                                                            <path d="M14 11v6" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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

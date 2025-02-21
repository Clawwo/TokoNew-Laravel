@extends('layouts.main')

@section('content')
    @include('components.sidebar')

    <div class="sm:ml-64">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">

                            <!-- Header -->
                            <div class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                                <div>
                                    <h2 class="mb-1 text-xl font-semibold text-gray-800 dark:text-neutral-200">Invoice</h2>
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">History Invoice</p>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th class="py-3 text-xs font-semibold tracking-wide text-gray-800 uppercase ps-6 text-start dark:text-neutral-200">Code</th>
                                        <th class="px-6 py-3 text-xs font-semibold tracking-wide text-gray-800 uppercase text-start dark:text-neutral-200">Date Payment</th>
                                        <th class="px-6 py-3 text-xs font-semibold tracking-wide text-gray-800 uppercase text-start dark:text-neutral-200">Customer</th>
                                        <th class="px-6 py-3 text-xs font-semibold tracking-wide text-gray-800 uppercase text-start dark:text-neutral-200">Payment Amount</th>
                                        <th class="px-6 py-3 text-start"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($penjualan as $pnjl)
                                        <tr>
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $pnjl->id_transaksi }}</td>
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-500">{{ Carbon\Carbon::parse($pnjl->tgl_transaksi)->format('d-m-Y') }}</td>
                                            <td class="px-6 py-3 text-sm text-gray-500 dark:text-white">{{ $pnjl->pelanggan->nama ?? 'Umum' }}</td>
                                            <td class="px-6 py-3 text-sm text-gray-500 dark:text-white">Rp. {{ $pnjl->total_transaksi }}</td>
                                            <td class="px-6 py-3 text-end">
                                                <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800" href="#" id="pdf" onclick="window.print()">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                        <polyline points="7 10 12 15 17 10" />
                                                        <line x1="12" x2="12" y1="15" y2="3" />
                                                    </svg>
                                                    Invoice PDF
                                                </a>
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
@endsection

@extends('layouts.main')

@section('content')
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
                                        Transaction Report
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        View reports containing a list transactions.
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
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Export PDF
                                    </a>
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
                                                Code Transaction
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
                                    @foreach ($penjualan as $index => $pnjl)
                                        <tr
                                            class="transition-colors duration-200 hover:bg-gray-50/50 dark:hover:bg-neutral-800/50">
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $index + 1 }}</td>
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-500">
                                                {{ Carbon\Carbon::parse($pnjl->tgl_transaksi)->format('d-m-Y') }}</td>
                                            <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $pnjl->id_transaksi }}</td>
                                            <td class="px-6 py-3 text-sm text-gray-500 dark:text-white">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium {{ isset($pnjl->pelanggan) ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'bg-gray-100 text-gray-800 dark:bg-gray-600/20 dark:text-gray-400' }}">
                                                    {{ isset($pnjl->pelanggan) ? $pnjl->pelanggan->nama : 'Umum' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 text-sm text-gray-500 dark:text-white">Rp.
                                                {{ $pnjl->total_transaksi }}</td>

                                            </trclass=>
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

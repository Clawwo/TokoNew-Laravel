@extends('layouts.main')

@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                    Edit Pelanggan
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Update the customer details below
                </p>
            </div>
            <!-- End Header -->

            <!-- Card -->
            <div
                class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="p-4 sm:p-7">
                    <form action="{{ route('updatePelanggan', $pelanggan->id_pelanggan) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('patch')
                        <div class="space-y-8">
                            <!-- Customer ID -->
                            <div class="relative group">
                                <label for="customer-id"
                                    class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                   ID Customer <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="customer-id" name="id_pelanggan"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400 group-hover:border-gray-300 dark:group-hover:border-neutral-600"
                                        placeholder="Enter customer ID" value="{{ $pelanggan->id_pelanggan }}" autocomplete="off"
                                        required>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition-opacity duration-200 opacity-0 pointer-events-none group-hover:opacity-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Name -->
                            <div class="relative group">
                                <label for="customer-name"
                                    class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Nama Pelanggan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="customer-name" name="nama"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400 group-hover:border-gray-300 dark:group-hover:border-neutral-600"
                                        placeholder="Enter customer name" value="{{ $pelanggan->nama }}" autocomplete="off"
                                        required>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition-opacity duration-200 opacity-0 pointer-events-none group-hover:opacity-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="relative group">
                                <label for="customer-gender"
                                    class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Gender <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select id="customer-gender" name="gender"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 bg-white border border-gray-200 rounded-lg appearance-none cursor-pointer focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400 group-hover:border-gray-300 dark:group-hover:border-neutral-600"
                                        required>
                                        <option value="L" {{ $pelanggan->gender == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P" {{ $pelanggan->gender == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition-opacity duration-200 opacity-0 pointer-events-none group-hover:opacity-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center pt-4 gap-x-2">
                                <a href="{{ route('tampilPelanggan') }}"
                                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold transition-all duration-200 bg-gray-100 border border-transparent rounded-lg text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-neutral-900 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 transform hover:scale-[1.02] active:scale-[0.98]">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Back
                                </a>

                                <button type="submit"
                                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900 transform hover:scale-[1.02] active:scale-[0.98] hover:shadow-lg">
                                    <span>Update Pelanggan</span>
                                    <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection

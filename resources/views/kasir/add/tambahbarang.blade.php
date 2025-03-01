@extends('layouts.main')

@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                    Add New Product
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Fill in the details below to add a new product to inventory
                </p>
            </div>
            <!-- End Header -->

            <!-- Card -->
            <div
                class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="p-4 sm:p-7">
                    <form action="{{ route('TambahBarangproces') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-8">
                        @csrf
                        <div class="space-y-8">
                            <!-- Product Name -->
                            <div class="relative group">
                                <label for="product-name"
                                    class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Product Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="product-name" name="nama_barang"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400 group-hover:border-gray-300 dark:group-hover:border-neutral-600"
                                        placeholder="Enter product name" autocomplete="off" required>
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

                            <!-- Price -->
                            <div class="relative group">
                                <label for="product-price"
                                    class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                                    Price <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400">Rp</span>
                                    </div>
                                    <input type="number" id="product-price" name="harga_barang"
                                        class="block w-full py-3 pl-12 pr-10 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400 group-hover:border-gray-300 dark:group-hover:border-neutral-600 hide-number-spinner"
                                        placeholder="0" min="0" required>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition-opacity duration-200 opacity-0 pointer-events-none group-hover:opacity-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Stock -->
                            <div class="relative group">
                                <label for="product-stock"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Stock <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" id="product-stock" name="stock"
                                        class="block w-full px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-400 group-hover:border-gray-300 dark:group-hover:border-neutral-600 hide-number-spinner"
                                        placeholder="0" min="0" required>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 transition-opacity duration-200 opacity-0 pointer-events-none group-hover:opacity-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="mb-4 sm:mb-8">
                                <label for="hs-feedback-post-comment-email-1"
                                    class="block mb-2 text-sm font-medium dark:text-white">Pictures</label>
                                <input type="file" id="hs-feedback-post-comment-email-1"
                                    class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Enter Price" name="image">
                            </div> --}}

                            <!-- Submit Button -->
                            <div class="flex items-center pt-4 gap-x-2">
                                <a href="{{ route('tampilBarang') }}"
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
                                    <span>Add Product</span>
                                    <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
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

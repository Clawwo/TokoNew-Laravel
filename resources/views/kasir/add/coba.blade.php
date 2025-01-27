@extends('layouts.main')

@section('content')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto">
            <div class="text-center">
                <h2 class="text-xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                    Edit Product
                </h2>
            </div>

            <!-- Card -->
            <div
                class="relative z-10 p-4 mt-5 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
                <form action="{{ route('updateBarang', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-name-1"
                            class="block mb-2 text-sm font-medium dark:text-white">Product Name</label>
                        <input type="text" id="hs-feedback-post-comment-name-1"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Enter Product Name" name="nama_barang" autocomplete="off" value="{{ $barang->nama_barang }}">
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-email-1"
                            class="block mb-2 text-sm font-medium dark:text-white">Price</label>
                        <input type="number" id="hs-feedback-post-comment-email-1"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Enter Price" name="harga_barang" value="{{ $barang->harga_barang }}">
                    </div>
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-email-1"
                            class="block mb-2 text-sm font-medium dark:text-white">Stock</label>
                        <input type="number" id="hs-feedback-post-comment-email-1"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Product Stock" name="stock" value="{{ $barang->stock }}">
                    </div>
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-email-1"
                            class="block mb-2 text-sm font-medium dark:text-white">Pictures</label>
                        <input type="file" id="hs-feedback-post-comment-email-1"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Enter Price" name="image" value="{{ $barang->image }}">
                            <img src="{{ asset('images/products/' . $barang->image) }}" alt="Gambar Barang">
                    </div>
                    <div class="grid mt-6">
                        <button type="submit"
                            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Submit</button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Comment Form -->
@endsection

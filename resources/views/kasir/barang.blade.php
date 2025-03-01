@extends('layouts.main')

@section('content')
    @include('components.sidebar')
    <div class="sm:ml-64">
        <!-- Table Section -->
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
                                        Products
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        Manage your products inventory, add new items, edit details, and track stock.
                                    </p>
                                </div>

                                <div class="flex flex-col items-center gap-4 sm:flex-row">
                                    <div class="flex items-center px-4 py-2 bg-gray-100 rounded-lg dark:bg-neutral-800">
                                        <span class="text-sm text-gray-600 dark:text-neutral-400">
                                            Total Products:
                                            <span
                                                class="ml-1 font-semibold text-gray-900 dark:text-neutral-200">{{ $total_barang }}</span>
                                        </span>
                                    </div>

                                    <a href="{{ route('tambahBarang') }}"
                                        class="inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg shadow-sm gap-x-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-md">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add Product
                                    </a>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead>
                                    <tr class="bg-gray-50 dark:bg-neutral-800">
                                        <th scope="col" class="py-3.5 pl-6 pr-3">
                                            <label for="select-all" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 border-gray-300 rounded cursor-pointer focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-neutral-800"
                                                    id="select-all">
                                                <span class="sr-only">Select all</span>
                                            </label>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Product
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Price
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Stock
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Created
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-right">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">

                                            </span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($barang as $brg)
                                        <tr
                                            class="transition-colors duration-200 hover:bg-gray-50/50 dark:hover:bg-neutral-800/50">
                                            <td class="py-4 pl-6 pr-3">
                                                <label for="product-{{ $brg->id_barang }}" class="flex">
                                                    <input type="checkbox"
                                                        class="text-blue-600 border-gray-300 rounded cursor-pointer focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-neutral-800"
                                                        id="product-{{ $brg->id_barang }}">
                                                    <span class="sr-only">Select product</span>
                                                </label>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center gap-x-3">
                                                    <div
                                                        class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-gray-100 rounded-lg dark:bg-neutral-800">
                                                        <svg class="w-6 h-6 text-gray-500"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                            {{ $brg->nama_barang }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    Rp {{ number_format($brg->harga_barang, 0, ',', '.') }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium {{ $brg->stock > 10 ? 'bg-green-100 text-green-800 dark:bg-green-800/20 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-800/20 dark:text-red-400' }}">
                                                    {{ $brg->stock }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm text-gray-500 dark:text-neutral-400">
                                                    {{ $brg->created_at->format('d M Y') }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <div class="flex items-center justify-end gap-x-2">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('EditBarang', $brg->id_barang) }}"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-blue-600 hover:text-white dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-blue-600">
                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                                            <path d="m15 5 4 4" />
                                                        </svg>
                                                        Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('HapusBarang', $brg->id_barang) }}"
                                                        method="POST" class="inline-block delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-red-50 dark:bg-transparent dark:border-neutral-700 dark:text-red-300 dark:hover:bg-neutral-800 delete-btn">
                                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M3 6h18" />
                                                                <path d="M8 6v14a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V6" />
                                                                <path d="M10 11v6" />
                                                                <path d="M14 11v6" />
                                                            </svg>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
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
        <!-- End Table Section -->
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
                showConfirmButton: false
            });
        @endif

        // Delete confirmation
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data produk akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection

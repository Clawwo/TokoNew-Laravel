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
                                        Employee
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                        Manage your employees, add new staff, edit details, and track roles.
                                    </p>
                                </div>

                                <div class="flex flex-col items-center gap-4 sm:flex-row">
                                    <div class="flex items-center px-4 py-2 bg-gray-100 rounded-lg dark:bg-neutral-800">
                                        <span class="text-sm text-gray-600 dark:text-neutral-400">
                                            Total Employees:
                                            <span
                                                class="ml-1 font-semibold text-gray-900 dark:text-neutral-200">{{ $total_pegawai }}</span>
                                        </span>
                                    </div>

                                    <a href="{{ route('tambahPegawai') }}"
                                        class="inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg shadow-sm gap-x-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-md">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add Employee
                                    </a>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Search Results Indicator -->
                            @if (request('search'))
                                <div class="px-6 py-2 bg-blue-50 dark:bg-blue-900/20">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-blue-600 dark:text-blue-400">
                                            Hasil pencarian untuk: "{{ request('search') }}"
                                            <span class="font-medium">({{ $total_pegawai }} hasil)</span>
                                        </p>
                                        <a href="{{ route('tampilPegawai') }}"
                                            class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                            Reset pencarian
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
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
                                                Employee
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Position
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Status
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-left">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Created
                                            </span>
                                        </th>

                                        <th scope="col" class="px-6 py-3.5 text-right"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($pegawai as $pgw)
                                        <tr
                                            class="transition-colors duration-200 hover:bg-gray-50/50 dark:hover:bg-neutral-800/50">
                                            <td class="py-4 pl-6 pr-3">
                                                <label for="employee-{{ $pgw->id_user }}" class="flex">
                                                    <input type="checkbox"
                                                        class="text-blue-600 border-gray-300 rounded cursor-pointer focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-neutral-800"
                                                        id="employee-{{ $pgw->id_user }}">
                                                    <span class="sr-only">Select employee</span>
                                                </label>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="inline-block size-[38px] rounded-full"
                                                        src="https://i.pinimg.com/236x/3c/ae/07/3cae079ca0b9e55ec6bfc1b358c9b1e2.jpg"
                                                        alt="Avatar">
                                                    <div>
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                            {{ $pgw->username }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400">
                                                    {{ $pgw->role }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-800/20 dark:text-green-400">
                                                    <svg class="w-2.5 h-2.5 mr-1.5" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm text-gray-500 dark:text-neutral-400">
                                                    {{ \Carbon\Carbon::parse($pgw->created_at)->format('d M Y') }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <div class="flex items-center justify-end gap-x-2">

                                                    <a href="{{ route('editPegawai', $pgw->id_user) }}"
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

                                                    <form action="{{ route('HapusPegawai', $pgw->id_user) }}"
                                                        method="POST" class="delete-form">
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
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($pegawai->isEmpty())
                                        <tr>
                                            <td colspan="6" class="px-6 py-12">
                                                <div class="text-center">
                                                    <svg class="w-12 h-12 mx-auto text-gray-400 dark:text-neutral-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <h3
                                                        class="mt-2 text-sm font-semibold text-gray-900 dark:text-neutral-200">
                                                        Tidak ada data
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-neutral-400">
                                                        {{ request('search') ? 'Tidak ada hasil yang cocok dengan pencarian Anda.' : 'Belum ada data pegawai yang tersedia.' }}
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
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        // Delete confirmation
        document.querySelectorAll('.delete-form').forEach(form => {
            form.querySelector('.delete-btn').addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data pegawai akan dihapus secara permanen!",
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

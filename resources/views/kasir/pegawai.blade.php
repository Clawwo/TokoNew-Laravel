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
                            class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                            <!-- Header -->
                            <div
                                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                                <div>
                                    <h2 class="mb-1 text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                        Employee
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        Add Employee, edit and more.
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <div
                                            class="grid gap-3 px-6 py-3 md:flex md:justify-between md:items-center dark:border-neutral-700">
                                            <div>
                                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                                    <span
                                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $total_pegawai }}</span>
                                                    results
                                                </p>
                                            </div>
                                        </div>

                                        <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                            href="{{ route('tambahPegawai') }}">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14" />
                                                <path d="M12 5v14" />
                                            </svg>
                                            Add Employee
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="py-3 ps-6 text-start">
                                            <label for="hs-at-with-checkboxes-main" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 border-gray-300 rounded shrink-0 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-main">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </th>

                                        <th scope="col" class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                    Name
                                                </span>
                                            </div>
                                        </th>
                                        {{-- <th scope="col" class="py-3 ml-6 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                    Email
                                                </span>
                                            </div>
                                        </th> --}}

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="px-16 text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                    Position
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                    Status
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                    Created
                                                </span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                                    @foreach ($pegawai as $pgw)
                                        <tr>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="py-3 ps-6">
                                                    <label for="hs-at-with-checkboxes-2" class="flex">
                                                        <input type="checkbox"
                                                            class="text-blue-600 border-gray-300 rounded shrink-0 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                            id="hs-at-with-checkboxes-2">
                                                        <span class="sr-only">Checkbox</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6">
                                                    <div class="flex items-center gap-x-3">
                                                        <img class="inline-block size-[38px] rounded-full"
                                                            src="https://i.pinimg.com/236x/3c/ae/07/3cae079ca0b9e55ec6bfc1b358c9b1e2.jpg"
                                                            alt="Avatar">
                                                        <div class="grow">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $pgw->username }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td class="size-px whitespace-nowrap">
                                                <div class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6">
                                                    <div class="flex items-center gap-x-3">
                                                        <div class="grow">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $pgw->email }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> --}}
                                            <td class="h-px w-72 whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block px-16 text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $pgw->role }}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        Active
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="text-sm text-gray-500 dark:text-neutral-500">{{ $pgw->created_at }}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-1.5">
                                                    <form action="{{ route('HapusPegawai', $pgw->id_user) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="flex items-center px-4 py-1 text-white bg-red-600 rounded hover:bg-red-700">
                                                            <i class="mr-2 fas fa-trash"></i>
                                                            Delete
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
@endsection

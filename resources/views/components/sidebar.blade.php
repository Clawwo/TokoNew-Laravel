<!-- ========== HEADER ========== -->
<header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="flex items-center w-full px-4 mx-auto sm:px-6 basis-full">
        <div class="flex items-center justify-end w-full ms-auto md:justify-between gap-x-1 md:gap-x-3">

            <div class="hidden md:block">

                @if (Request::routeIs('riwayatInvoice') || Request::routeIs('filterInvoice'))
                    <!-- Filter Form -->
                    <form action="{{ route('filterInvoice') }}" method="GET" class="my-3 print:hidden">
                        <div class="grid items-end grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            <!-- Input Dari Tanggal -->
                            <div class="flex flex-col gap-1">
                                <input type="date" id="start_date" name="start_date"
                                    class="px-3 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:focus:ring-blue-600 dark:focus:border-blue-600">
                            </div>
                            <!-- Input Sampai Tanggal -->
                            <div class="flex flex-col gap-1">
                                <input type="date" id="end_date" name="end_date"
                                    class="px-3 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:focus:ring-blue-600 dark:focus:border-blue-600">
                            </div>

                            <!-- Tombol Filter -->
                            <div>
                                <button type="submit"
                                    class="w-full px-4 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-600">
                                    <i class="mr-2 fas fa-filter"></i> Filter
                                </button>
                            </div>


                            <!-- Tombol Reset -->
                            <div>
                                <a href="{{ route('riwayatInvoice') }}"
                                    class="block w-full px-4 py-3 text-sm font-medium text-center text-gray-700 bg-gray-100 rounded-lg shadow-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:bg-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-600">
                                    <i class="mr-2 fas fa-sync-alt"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- End Filter Form -->
                @else
                    <!-- Search Input -->
                    <form
                        action="{{ Request::routeIs('tampilPelanggan') ? route('tampilPelanggan') : (Request::routeIs('tampilPegawai') ? route('tampilPegawai') : (Request::routeIs('tampilBarang') ? route('tampilBarang') : '#')) }}"
                        method="GET">
                        <div
                            class="p-1.5 flex flex-col sm:flex-row items-center gap-2 border border-gray-200 rounded-lg dark:border-neutral-700">
                            <div class="relative w-full">
                                <label for="hero-input" class="sr-only">Search</label>
                                <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none start-0 ps-3">
                                    <svg class="text-gray-400 size-4 dark:text-neutral-400"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="hero-input" name="search" value="{{ request('search') }}"
                                    class="block w-full py-2 text-sm border-transparent rounded-lg ps-9 pe-3 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500"
                                    placeholder="{{ Request::routeIs('tampilPelanggan') ? 'Cari pelanggan...' : (Request::routeIs('tampilPegawai') ? 'Cari pegawai...' : (Request::routeIs('tampilBarang') ? 'Cari produk...' : 'Search...')) }}"
                                    autocomplete="off">
                            </div>
                            <button type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900">
                                Search
                            </button>
                        </div>
                    </form>
                    <!-- End Search Input -->
                @endif

            </div>

            <div class="flex flex-row items-center justify-end gap-2">
                <!-- Notifications -->
                <button type="button"
                    class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-gray-200 rounded-lg size-9 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <!-- User Menu -->
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button type="button"
                        class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-gray-200 rounded-lg size-9 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->

<!-- Sidebar -->
<div id="hs-application-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-neutral-800 dark:border-neutral-700">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold dark:text-white" href="#">
            TablePluss
        </a>
    </div>

    <nav class="flex flex-col flex-wrap w-full p-6">
        <ul class="space-y-1.5">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('Dashboard') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm {{ Request::routeIs('Dashboard') ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700' }} focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 3a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3zm10 0a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V3zM3 14a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-7zm11-4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V10z" />
                    </svg>
                    Dashboard
                </a>
            </li>

            <!-- Customer -->
            <li>
                <a href="{{ route('tampilPelanggan') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm {{ Request::routeIs('tampilPelanggan') ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700' }} focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Customers
                </a>
            </li>

            <!-- Employee -->
            <li>
                <a href="{{ route('tampilPegawai') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm {{ Request::routeIs('tampilPegawai') ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700' }} focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Employees
                </a>
            </li>

            <!-- Invoice History -->
            <li>
                <a href="{{ route('riwayatInvoice') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm {{ Request::routeIs('riwayatInvoice') ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700' }} focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Invoice History
                </a>
            </li>

            <!-- Products -->
            <li>
                <a href="{{ route('tampilBarang') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm {{ Request::routeIs('tampilBarang') ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700' }} focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Products
                </a>
            </li>

            <!-- Transaction -->
            <li>
                <a href="{{ route('transaksi.create') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm {{ Request::routeIs('transaksi.create') ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/20 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700' }} focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Transaction
                </a>
            </li>

            <!-- Divider -->
            <li class="my-3 border-t border-gray-200 dark:border-neutral-700"></li>

            <!-- Logout -->
            <li>
                <a href="{{ route('logout') }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 dark:text-red-500 dark:hover:bg-red-800/10 dark:focus:ring-offset-neutral-900">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Sidebar -->

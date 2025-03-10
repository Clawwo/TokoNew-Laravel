@foreach ($penjualan as $pnjl)
@endforeach
<div id="hs-ai-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-ai-modal-label">
    <div
        class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">
        <div
            class="relative flex flex-col bg-white shadow-lg pointer-events-auto rounded-xl dark:bg-neutral-800 print:shadow-none">
            <!-- Konten modal -->
            <div class="p-4 overflow-y-auto sm:p-7">
                <div class="text-center">
                    <h3 id="hs-ai-modal-label" class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Invoice Transaction
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                        Invoice Details
                    </p>
                </div>

                <!-- Grid -->
                <div class="flex justify-between gap-5 mx-4 mt-5 sm:mt-10">
                    <div>
                        <span class="block text-xs text-gray-500 uppercase dark:text-neutral-500">Amount paid</span>
                        <span
                            class="block text-sm font-medium text-gray-800 dark:text-neutral-200 amount-paid">{{ number_format($pnjl->total_transaksi, 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <span class="block text-xs text-gray-500 uppercase dark:text-neutral-500">Date paid</span>
                        <span
                            class="block text-sm font-medium text-gray-800 dark:text-neutral-200 date-paid">{{ Carbon\Carbon::parse($pnjl->tgl_transaksi)->format('d-m-Y') }}</span>
                    </div>
                </div>

                <!-- Item List -->
                <div class="mt-5 sm:mt-10">
                    <h4 class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Summary</h4>
                    <ul class="flex flex-col mt-3 item-list">
                        <!-- Items will be inserted here -->
                    </ul>
                </div>

                <!-- Button -->
                <div class="flex justify-end mt-5 gap-x-2">
                    <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none print:hidden"
                        onclick="window.print()">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect width="12" height="8" x="6" y="14" />
                        </svg>
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

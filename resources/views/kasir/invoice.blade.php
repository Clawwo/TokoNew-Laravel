{{-- resources/views/kasir/invoice.blade.php --}}
<div class="container p-6 mx-auto text-gray-800 border rounded-lg shadow-md dark:bg-neutral-800 dark:border-neutral-700">
    <h2 class="mb-6 text-3xl font-semibold text-center dark:text-neutral-200">Invoice Transaksi</h2>

    {{-- <div class="mb-4">
        <p class="font-medium dark:text-neutral-200">Nomor Invoice: <strong>{{ $invoice['nomor_invoice'] }}</strong></p>
        <p class="dark:text-neutral-200">Tanggal: <strong>{{ $invoice['tanggal_transaksi']->format('d F Y') }}</strong></p>
        <p class="dark:text-neutral-200">Pelanggan: <strong>{{ $invoice['pelanggan'] }}</strong></p>
    </div> --}}

    <div class="mb-6">
        <h3 class="text-xl font-semibold dark:text-neutral-200">Detail Barang:</h3>
        <table class="w-full mt-4 border-collapse table-auto">
            <thead>
                <tr>
                    <th class="p-2 border-b dark:text-neutral-200">Nama Barang</th>
                    <th class="p-2 border-b dark:text-neutral-200">Harga Satuan</th>
                    <th class="p-2 border-b dark:text-neutral-200">Jumlah</th>
                    <th class="p-2 border-b dark:text-neutral-200">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice as $detail)
                    <tr>
                        <td class="p-2 border-b dark:text-neutral-200">{{ $detail['nama_barang'] }}</td>
                        <td class="p-2 border-b dark:text-neutral-200">{{ number_format($detail['harga_satuan'], 0, ',', '.') }}</td>
                        <td class="p-2 border-b dark:text-neutral-200">{{ $detail['jumlah'] }}</td>
                        <td class="p-2 border-b dark:text-neutral-200">{{ number_format($detail['subtotal'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-between mt-6">
        <h3 class="text-xl font-semibold dark:text-neutral-200">Total Transaksi: <span>{{ number_format($invoice['total_transaksi'], 0, ',', '.') }}</span></h3>
    </div>

    <div class="mt-8">
        <p class="text-center dark:text-neutral-200">Terima kasih atas transaksi Anda!</p>
    </div>
</div>

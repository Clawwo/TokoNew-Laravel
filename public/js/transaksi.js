document.addEventListener("DOMContentLoaded", function () {
    let barangIndex = 1;

    function formatRupiah(angka) {
        return `Rp. ${angka.toLocaleString("id-ID")}`;
    }

    function updateBarangListener() {
        document.querySelectorAll(".id-barang").forEach((input) => {
            input.addEventListener("change", function () {
                let idBarang = this.value;
                let parent = this.closest(".barang-item");
                fetch(`/barang/${idBarang}`)
                    .then((response) => response.json())
                    .then((data) => {
                        if (data) {
                            parent.querySelector(".nama-barang").value =
                                data.nama_barang;
                            parent.querySelector(".harga-satuan").value =
                                formatRupiah(data.harga_barang);
                            parent
                                .querySelector(".harga-satuan")
                                .setAttribute("data-harga", data.harga_barang);
                            parent
                                .querySelector(".jumlah")
                                .setAttribute("max", data.stock);
                            updateSubtotal(parent);
                        } else {
                            parent.querySelector(".nama-barang").value = "";
                            parent.querySelector(".harga-satuan").value = "";
                        }
                    })
                    .catch((error) => console.error("Error:", error));
            });
        });

        document.querySelectorAll(".jumlah").forEach((input) => {
            input.addEventListener("input", function () {
                let parent = this.closest(".barang-item");
                updateSubtotal(parent);
            });
        });
    }

    function updateSubtotal(parent) {
        let harga =
            parseFloat(
                parent.querySelector(".harga-satuan").getAttribute("data-harga")
            ) || 0;
        let jumlah = parseInt(parent.querySelector(".jumlah").value) || 1;
        let subtotal = harga * jumlah;
        parent.querySelector(".subtotal").textContent = formatRupiah(subtotal);
        updateTotalHarga();
    }

    function updateTotalHarga() {
        let total = 0;
        document.querySelectorAll(".subtotal").forEach((subtotal) => {
            let subtotalValue = subtotal.textContent
                .replace("Rp. ", "")
                .replace(/\./g, "")
                .replace(/,/g, "");
            total += parseFloat(subtotalValue) || 0;
        });
        document.getElementById("total-harga").textContent =
            formatRupiah(total);
    }

    document
        .getElementById("add-barang")
        .addEventListener("click", function () {
            let container = document.getElementById("barang-container");
            let newItem = document.createElement("div");
            newItem.classList.add(
                "flex",
                "items-center",
                "gap-4",
                "p-4",
                "border",
                "rounded",
                "barang-item",
                "dark:bg-neutral-800",
                "dark:border-neutral-700"
            );
            newItem.innerHTML = `
            <div class="relative flex items-center">
                <i class="absolute text-gray-500 fas fa-barcode left-3"></i>
                <input type="text" name="barang[${barangIndex}][id_barang]" class="p-2 pl-10 border id-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="ID Barang" autocomplete="off" required>
            </div>
            <div class="relative flex items-center">
                <i class="absolute text-gray-500 fas fa-box left-3"></i>
                <input type="text" class="p-2 pl-10 border nama-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="Nama Barang" readonly>
            </div>
            <div class="relative flex items-center">
                <i class="absolute text-gray-500 fas fa-tag left-3"></i>
                <input type="text" class="w-full p-2 pl-10 border harga-satuan dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="Harga Satuan" readonly data-harga="0">
            </div>
            <div class="relative flex items-center">
                <i class="absolute text-gray-500 fas fa-sort-numeric-up left-3"></i>
                <input type="number" name="barang[${barangIndex}][jml_barang]" class="p-2 pl-10 border jumlah dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" min="1" value="1">
            </div>
            <div class="ml-auto">
                <h3 class="font-semibold text-right dark:text-neutral-200 subtotal">Rp. 0</h3>
            </div>
        `;
            container.appendChild(newItem);
            updateBarangListener();
            barangIndex++;
        });

    updateBarangListener();

    document
        .getElementById("id_pelanggan")
        .addEventListener("change", function () {
            let idPelanggan = this.value;
            fetch(`/get-pelanggan/${idPelanggan}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        document.getElementById("nama_pelanggan").value =
                            data.nama;
                    } else {
                        document.getElementById("nama_pelanggan").value = "";
                    }
                })
                .catch((error) => console.error("Error:", error));
        });

    const submitButton = document.getElementById("submitTransaksi");
    if (submitButton) {
        submitButton.addEventListener("click", function () {
            const form = document.getElementById("transaksiForm");
            const formData = new FormData(form);

            fetch(form.action, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        console.log("Transaksi berhasil:", data);

                        // Perbarui konten modal dengan data transaksi
                        const amountPaidElement =
                            document.querySelector(".amount-paid");
                        if (amountPaidElement) {
                            amountPaidElement.textContent = data.amount_paid;
                        }

                        const datePaidElement =
                            document.querySelector(".date-paid");
                        if (datePaidElement) {
                            datePaidElement.textContent =
                                data.tanggal_transaksi;
                        }

                        const itemList = document.querySelector(".item-list");
                        if (itemList) {
                            itemList.innerHTML = data.items
                                .map(
                                    (item) => `
                            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                                <div class="flex items-center justify-between w-full">
                                    <span>${item.nama_barang} (x${item.jumlah})</span>
                                    <span>Rp ${item.total_harga}</span>
                                </div>
                            </li>
                        `
                                )
                                .join("");
                        }

                        // Tampilkan modal
                        const modal = document.querySelector("#hs-ai-modal");
                        if (modal) {
                            modal.classList.remove("hidden");
                            modal.classList.add("hs-overlay-open");
                            console.log("Modal ditampilkan");

                            // Memicu dialog cetak
                            setTimeout(() => {
                                window.print();
                            }, 500); // Penundaan untuk memastikan modal sepenuhnya dirender
                        } else {
                            console.error("Elemen modal tidak ditemukan");
                        }

                        // Reset input form
                        form.reset();
                    } else {
                        // Tangani kesalahan
                        alert("Error: " + data.message);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan: " + error.message);
                });
        });
    } else {
        console.error("Tombol submit tidak ditemukan");
    }

    // Fungsi untuk menutup modal
    document.querySelectorAll(".close-modal").forEach((button) => {
        button.addEventListener("click", function () {
            const modal = document.querySelector("#hs-ai-modal");
            if (modal) {
                modal.classList.add("hidden");
                modal.classList.remove("hs-overlay-open");
            }
        });
    });

    document.querySelectorAll(".print-invoice").forEach((button) => {
        button.addEventListener("click", function () {
            const transactionId = this.dataset.transactionId;

            // Fetch transaction data
            fetch(`/api/transaction/${transactionId}`)
                .then((response) => response.json())
                .then((data) => {
                    // Populate modal with transaction data
                    const itemList = document.querySelector(".item-list");
                    itemList.innerHTML = data.items
                        .map(
                            (item) => `
                    <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                        <div class="flex items-center justify-between w-full">
                            <span>${item.nama_barang} (x${item.jumlah})</span>
                            <span>Rp ${item.total_harga}</span>
                        </div>
                    </li>
                `
                        )
                        .join("");

                    // Show modal
                    const modal = document.querySelector("#hs-ai-modal");
                    if (modal) {
                        modal.classList.remove("hidden");
                        modal.classList.add("hs-overlay-open");

                        // Trigger print
                        setTimeout(() => {
                            window.print();
                        }, 500);
                    } else {
                        console.error("Modal element not found");
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});

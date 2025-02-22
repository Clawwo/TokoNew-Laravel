import "preline";
import $ from "jquery";

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
                "grid",
                "grid-cols-5",
                "gap-4",
                "items-center",
                "barang-item",
                "bg-neutral-800",
                "p-4",
                "rounded",
                "border",
                "dark:border-neutral-700"
            );
            newItem.innerHTML = `
            <input type="text" name="barang[${barangIndex}][id_barang]" class="p-2 border id-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="ID Barang" autocomplete="off">
            <input type="text" class="p-2 border nama-barang dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="Nama Barang" readonly>
            <input type="text" class="p-2 border harga-satuan dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" placeholder="Harga Satuan" readonly data-harga="0">
            <input type="number" name="barang[${barangIndex}][jml_barang]" class="p-2 border jumlah dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700" min="1" value="1">
            <h3 class="font-semibold text-right subtotal dark:text-neutral-200"></h3>
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
            fetch(`/cek-pelanggan/${idPelanggan}`)
                .then((response) => response.json())
                .then((data) => {
                    let statusDiv = document.getElementById("status-member");
                    if (data.status === "member") {
                        statusDiv.innerHTML =
                            '<span class="text-green-500">Pelanggan Terdaftar (Mendapat Diskon)</span>';
                    } else {
                        statusDiv.innerHTML =
                            '<span class="text-red-500">Pelanggan Tidak Terdaftar (Tanpa Diskon)</span>';
                    }
                })
                .catch((error) => console.error("Error:", error));
        });

    document.querySelector("form").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);
        let barangData = [];

        document.querySelectorAll(".barang-item").forEach((item, index) => {
            let idBarang = item.querySelector(".id-barang").value;
            let jmlBarang = item.querySelector(".jumlah").value;
            let hargaSatuan = item
                .querySelector(".harga-satuan")
                .getAttribute("data-harga");

            barangData.push({
                id_barang: idBarang,
                jml_barang: jmlBarang,
                harga_satuan: hargaSatuan,
            });
        });

        formData.append("barang", JSON.stringify(barangData));

        fetch(this.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert("Terjadi kesalahan saat menyimpan transaksi.");
                }
            })
            .catch((error) => console.error("Error:", error));
    });
});

document
    .getElementById("open-modal-button")
    .addEventListener("click", function () {
        // Tunggu hingga modal benar-benar terlihat
        let modal = document.getElementById("hs-ai-modal");

        // Periksa secara berkala apakah modal sudah terbuka
        let checkModalOpen = setInterval(function () {
            if (!modal.classList.contains("hidden")) {
                clearInterval(checkModalOpen); // Hentikan interval
                setTimeout(function () {
                    window.print(); // Cetak setelah modal benar-benar muncul
                }, 500); // Tambahkan jeda untuk memastikan tampilan modal stabil sebelum mencetak
            }
        }, 100);
    });

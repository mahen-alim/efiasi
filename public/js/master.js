document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#date", {
        enableTime: false, // Enable time selection
        dateFormat: "Y-m-d", // Specify the date format
    });
});

document
    .getElementById("exampleInputServiceType")
    .addEventListener("change", function () {
        var priceInput = document.getElementById("exampleInputPrice");
        var serviceType = this.value;

        switch (serviceType) {
            case "Detailing Interior":
                priceInput.value = 200000;
                break;
            case "Detailing Eksterior":
                priceInput.value = 300000;
                break;
            case "Detailing Velg & Ban":
                priceInput.value = 350000;
                break;
            case "Detailing Kaca Mobil":
                priceInput.value = 150000;
                break;
            case "Detailing Ruang Mesin":
                priceInput.value = 500000;
                break;
            default:
                priceInput.value = 0;
        }
    });

// Mendapatkan elemen input harga
var priceInput = document.getElementById("exampleInputDuration");

// Menambahkan event listener untuk memantau perubahan pada input
priceInput.addEventListener("input", function () {
    // Menghapus karakter non-angka dari nilai input
    this.value = this.value.replace(/\D/g, "");
});


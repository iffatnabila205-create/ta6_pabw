document.addEventListener("DOMContentLoaded", function () {

    // Pastikan elemen peta tersedia
    const mapElement = document.getElementById("map");

    if (!mapElement) {
        console.error("Elemen dengan ID 'map' tidak ditemukan.");
        return;
    }

    // Pastikan library Leaflet sudah dimuat
    if (typeof L === "undefined") {
        console.error(
            "Leaflet gagal dimuat. Periksa koneksi internet."
        );
        mapElement.innerHTML =
            "<p style='padding:20px;color:red'>" +
            "Peta gagal dimuat. Periksa koneksi internet dan Leaflet JS." +
            "</p>";
        return;
    }

    // Koordinat pusat Kabupaten Garut
    const map = L.map("map").setView([-7.2167, 107.9000], 10);

    // Tampilan peta OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">' +
            'OpenStreetMap</a> contributors',
        maxZoom: 19
    }).addTo(map);

    // Data lokasi wisata
    const lokasiWisata = [
        {
            nama: "Gunung Papandayan",
            koordinat: [-7.3195, 107.7315],
            deskripsi: "Destinasi wisata alam pegunungan."
        },
        {
            nama: "Situ Bagendit",
            koordinat: [-7.1555, 107.9235],
            deskripsi: "Destinasi wisata danau di Garut."
        },
        {
            nama: "Pantai Santolo",
            koordinat: [-7.6650, 107.6870],
            deskripsi: "Destinasi wisata pantai di Garut Selatan."
        }
    ];

    // Tambahkan marker ke peta
    lokasiWisata.forEach(function (wisata) {
        L.marker(wisata.koordinat)
            .addTo(map)
            .bindPopup(
                "<b>" + wisata.nama + "</b><br>" +
                wisata.deskripsi
            );
    });

    // Atur tampilan agar semua marker terlihat
    const batasPeta = L.latLngBounds(
        lokasiWisata.map(function (wisata) {
            return wisata.koordinat;
        })
    );

    map.fitBounds(batasPeta, {
        padding: [30, 30],
        maxZoom: 11
    });

    // Membantu jika ukuran peta berubah
    setTimeout(function () {
        map.invalidateSize();
    }, 200);

});

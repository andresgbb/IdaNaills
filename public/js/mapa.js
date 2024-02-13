let map = L.map('mi_mapa').setView([41.28063,1.97772], 16)

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([41.28063,1.97772]).addTo(map).bindPopup("Tienda IdaNails")
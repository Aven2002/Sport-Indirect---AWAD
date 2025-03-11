<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - Sport Indirect</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>  
  <link rel="stylesheet" href="{{ asset('css/findstore.css') }}">
</head>

@extends('layout.userlayout')

@section('content')

<body>
    <div class="container">
        <!-- Store List -->
        <div class="store-list">
            <h2 class="available-header">Available Stores</h2>
            @foreach($stores as $store)
                <div onclick="showStore({{ $store['lat'] }}, {{ $store['lng'] }}, '{{ $store['name'] }}', '{{ $store['address'] }}')">
                    <h4>{{ $store['name'] }}</h4>
                    <p>{{ $store['address'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Map -->
        <div id="map"></div>
    </div>

    <script>
        var map = L.map('map').setView([3.1390, 101.6869], 12); // Default center: Kuala Lumpur
        var userMarker, storeMarker; // Markers for user and selected store

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Get User Location
        let userLocation = null;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    userLocation = { lat: position.coords.latitude, lng: position.coords.longitude };

                    userMarker = L.marker([userLocation.lat, userLocation.lng], {
                        icon: L.icon({
                            iconUrl: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                            iconSize: [25, 41],
                            iconAnchor: [12, 41]
                        })
                    }).addTo(map).bindPopup("You are here").openPopup();

                    map.setView([userLocation.lat, userLocation.lng], 13);
                },
                function() {
                    alert("Could not get your location.");
                }
            );
        }

        // Show store details on map
        function showStore(lat, lng, name, address) {
            if (storeMarker) map.removeLayer(storeMarker); // Remove previous marker

            storeMarker = L.marker([lat, lng]).addTo(map).bindPopup(`<b>${name}</b><br>${address}`).openPopup();
            map.setView([lat, lng], 14);

            // Calculate distance if user location is available
            if (userLocation) {
                let distance = getDistance(userLocation.lat, userLocation.lng, lat, lng);
                storeMarker.bindPopup(`<b>${name}</b><br>${address}<br><b>Distance:</b> ${distance.toFixed(2)} km`).openPopup();
            }
        }

        // Calculate distance between two coordinates (Haversine Formula)
        function getDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius of Earth in km
            const dLat = (lat2 - lat1) * (Math.PI / 180);
            const dLon = (lon2 - lon1) * (Math.PI / 180);
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + 
                      Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) * 
                      Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c; // Distance in km
        }
    </script>
</body>
</html>
@endsection

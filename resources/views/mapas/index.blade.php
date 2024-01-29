@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Selecciona una provincia en el mapa</h1>
        <div id="map" style="height: 460px;"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var ciudadesCoordenadas = @json($ciudadesCoordenadas);

        let map = L.map('map').setView([39.900000, -4.000000], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            minZoom: 6,
            bounds: [[35.0, -10.0], [43.5, 5.0]],
        }).addTo(map);

        map.on('click', function (e) {
            console.log('Clic detectado:', e.latlng.lat, e.latlng.lng);

            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Lógica para determinar la ciudad más cercana
            var ciudadCercana = determinarCiudadCercana(lat, lng);

            if (ciudadCercana) {
                // Redirige a la vista 'show' con el enlace de la ciudad
                window.location.href = "{{ route('mapas.show') }}?latitud=" + lat + "&longitud=" + lng + "&ciudad=" + ciudadCercana;
            } else {
                // Manejar el caso donde no hay ciudad cercana
                console.log('No hay ciudad cercana.');
            }
        });

        function determinarCiudadCercana(lat, lng) {
            var ciudadCercana = null;
            var distanciaMinima = Number.MAX_VALUE;

            // Itera sobre las ciudades y calcula la distancia
            Object.keys(ciudadesCoordenadas).forEach(function (ciudad) {
                var ciudadLat = ciudadesCoordenadas[ciudad].lat;
                var ciudadLng = ciudadesCoordenadas[ciudad].lng;

                var distancia = calcularDistancia(lat, lng, ciudadLat, ciudadLng);

                if (distancia < distanciaMinima) {
                    distanciaMinima = distancia;
                    ciudadCercana = ciudad;
                }
            });

            return ciudadCercana;
        }

        function calcularDistancia(lat1, lng1, lat2, lng2) {
            // Implementa la lógica para calcular la distancia entre dos puntos geográficos.
            // Puedes utilizar fórmulas como la fórmula del haversine o usar una biblioteca como Leaflet.
            // Aquí tienes un ejemplo simple utilizando Leaflet:
            var punto1 = L.latLng(lat1, lng1);
            var punto2 = L.latLng(lat2, lng2);

            var distancia = punto1.distanceTo(punto2);

            return distancia;
        }
    </script>

    <div id="mapa-info-container">
        <!-- Aquí se cargará la vista 'mapas.show' de manera dinámica -->
    </div>
@endsection
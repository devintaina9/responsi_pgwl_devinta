@extends('template')



@section('content')
    <div id="map" style="width: 100vw; height: 100vh; margin: 0"></div>
@endsection

@section('script')
   
    <script>
        // Map
        var map = L.map('map').setView([-7.7956, 110.3695], 12);

        //Basemap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


 /* GeoJSON Point */
 var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>"
                    ;

                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

          // GeoJSON Geoserver TIITK WISATA
          var administrasiLayer = L.geoJson(null, {
            style: function (feature) {
                var value = feature.properties.fid;
                // return {
                //     fillColor: getColor(value),
                //     weight: 2,
                //     opacity: 1,
                //     color: "black",
                //     dashArray: "3",
                //     fillOpacity: 0.7,
                // };
            },
            onEachFeature: function (feature, layer) {
                var content = "id: " + feature.properties.fid + "<br" + "kecamatan:" + feature.properties.namobj + "<br" ;
                layer.on({
                    click: function (e) {
                        layer.bindPopup(content).openPopup();
                    },
                    mouseover: function (e) {
                        layer.bindTooltip(feature.properties.fid).openTooltip();
                    },
                    mouseout: function (e) {
                        layer.closePopup();
                        layer.closeTooltip();
                    }
                });
            }
        });

        // Memuat data geojson
        fetch('{{ asset("storage/geojson/wisataklatenshp.geojson") }}')
            .then(response => response.json())
            .then(data => {
                administrasiLayer.addData(data);
                administrasiLayer.addTo(map);
            })
            .catch(error => console.log('Error GeoJSON:', error));

        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>"
                    ;
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>"
                    ;
                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        // GeoJSON Geoserver ADMINISTRASI
        var administrasiLayer = L.geoJson(null, {
            style: function (feature) {
                var value = feature.properties.fid;
                // return {
                //     fillColor: getColor(value),
                //     weight: 2,
                //     opacity: 1,
                //     color: "black",
                //     dashArray: "3",
                //     fillOpacity: 0.7,
                // };
            },
            onEachFeature: function (feature, layer) {
                var content = "id: " + feature.properties.fid + "<br" + "kecamatan:" + feature.properties.namobj + "<br" ;
                layer.on({
                    click: function (e) {
                        layer.bindPopup(content).openPopup();
                    },
                    mouseover: function (e) {
                        layer.bindTooltip(feature.properties.fid).openTooltip();
                    },
                    mouseout: function (e) {
                        layer.closePopup();
                        layer.closeTooltip();
                    }
                });
            }
        });

        // Memuat data geojson
        fetch('{{ asset("storage/geojson/areaklatenshp2.geojson") }}')
            .then(response => response.json())
            .then(data => {
                administrasiLayer.addData(data);
                administrasiLayer.addTo(map);
            })
            .catch(error => console.log('Error GeoJSON:', error));

        //layer control
        var overlayMaps = {
            "Point": point,
            "Polyline": polyline,
            "Polygon": polygon,
            "Administrasi" : administrasiLayer,
        };

        var layerControl = L.control.layers(null, overlayMaps, {collapsed: false}).addTo(map);

    </script>
@endsection
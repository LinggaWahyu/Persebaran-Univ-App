@extends('layouts.app-user')

@section('header')
    <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('Frontend/images/arcmap.png') }}" alt="Cari Univ App" width="45px">Cari Univ App</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6">
         
               <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="{{ route('home') }}">Home</a> </li>
                      <li> <a href="{{ route('login') }}">Login</a> </li>
                     </ul>
                   </nav>
                 </div>
               </div> 
              </div>
           </div>
         </div>
       </div>
     </div>
@endsection

@section('content')
    <section class="page-content">
      <div class="page-home">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div id="map"></div>
              </div>
          </div>
          <div class="container mb-5">
            <div class="row mt-5 mb-5">
              <div class="col-12 text-center pt-4">
                <h2>
                  <b>{{ $univ->nama }}</b>
                </h2>
              </div>
            </div>
            <div class="row pt-4">
              <div class="col-4 text-center">
                <img
                  src="{{ asset(Storage::url($univ->logo)) }}"
                  class="w-50"
                  alt=""
                />
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col-12">
                    <h6><b>Alamat</b></h6>
                    <h6 class="text-secondary">
                      {{ $univ->alamat }}
                    </h6>
                  </div>
                  <div class="col-12 mt-4">
                    <h6><b>Kabupaten/Kota</b></h6>
                    <h6 class="text-secondary">{{ ucwords(strtolower($univ->kab_kota)) }}</h6>
                  </div>
                  <div class="col-12 mt-4">
                    <h6><b>Provinsi</b></h6>
                    <h6 class="text-secondary">{{ ucwords(strtolower($univ->provinsi)) }}</h6>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col-12">
                    <h6><b>Website</b></h6>
                    <a href="{{ $univ->link_web }}" target="_blank"
                      ><h6 class="text-secondary">{{ $univ->link_web }}</h6></a
                    >
                  </div>
                  <div class="col-12 mt-4">
                    <h6><b>No. Telepon</b></h6>
                    <h6 class="text-secondary">{{ $univ->no_telp }}</h6>
                  </div>
                  <div class="col-12 mt-4">
                    <h6><b>Jumlah Mahasiswa</b></h6>
                    <h6 class="text-secondary">{{ number_format($univ->jumlah_mahasiswa, 0, ".", ".") }}</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pt-4">
              <div class="col-4"></div>
              <div class="col-4">
                <h6><b>Status Kementerian</b></h6>
                <h6 class="text-secondary">{{ $univ->status }}</h6>
              </div>
              <div class="col-4">
                <h6><b>Bidang Keilmuan</b></h6>
                <ul>
                  @foreach($univ->bidang_keilmuan as $bidang_keilmuan)
                    <li>{{ $bidang_keilmuan }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@push('addon-script')
    <script type="text/javascript">
      mapboxgl.accessToken =
        "pk.eyJ1IjoibGluZ2dhd2FoeXUiLCJhIjoiY2tuYzBsdTI3MXZoNDJ2bGdsMXZzcmszbCJ9.2-I9dM3g_HpoPcFbZzU9qQ";

      var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v10",
        center: [{{ $univ->longitude }}, {{ $univ->latitude }}],
        zoom: 15,
      });

      map.addControl(new mapboxgl.NavigationControl());

      var geolocate = new mapboxgl.GeolocateControl({
        fitBoundsOptions: {
          maxZoom: 20
        },
        showAccuracyCircle: false,
        positionOptions: {
          enableHighAccuracy: true,
        },
        trackUserLocation: true,
      });

      map.addControl(geolocate);

      // initialize the map canvas to interact with later
      var canvas = map.getCanvasContainer();

      // an arbitrary start will always be the same
      // only the end or destination will change
      var start = [{{ $univ->longitude }}, {{ $univ->latitude }}];

      // this is where the code for the next step will go
      function getRoute(end) {
        // make a directions request using cycling profile
        // an arbitrary start will always be the same
        // only the end or destination will change
        var start = [{{ $univ->longitude }}, {{ $univ->latitude }}];
        var url =
          "https://api.mapbox.com/directions/v5/mapbox/cycling/" +
          start[0] +
          "," +
          start[1] +
          ";" +
          end[0] +
          "," +
          end[1] +
          "?steps=true&geometries=geojson&access_token=" +
          mapboxgl.accessToken;

          console.log(url);

        // make an XHR request https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
        var req = new XMLHttpRequest();
        req.open("GET", url, true);
        req.onload = function () {
          var json = JSON.parse(req.response);
          var data = json.routes[0];
          var route = data.geometry.coordinates;
          var geojson = {
            type: "Feature",
            properties: {},
            geometry: {
              type: "LineString",
              coordinates: route,
            },
          };
          // if the route already exists on the map, reset it using setData
          if (map.getSource("route")) {
            map.getSource("route").setData(geojson);
          } else {
            // otherwise, make a new request
            map.addLayer({
              id: "route",
              type: "line",
              source: {
                type: "geojson",
                data: {
                  type: "Feature",
                  properties: {},
                  geometry: {
                    type: "LineString",
                    coordinates: geojson,
                  },
                },
              },
              layout: {
                "line-join": "round",
                "line-cap": "round",
              },
              paint: {
                "line-color": "#3887be",
                "line-width": 5,
                "line-opacity": 0.75,
              },
            });
          }
          // add turn instructions here at the end
        };
        req.send();
      }

      var geojson = {
        type: "FeatureCollection",
        features: [
          {
            type: "Feature",
            geometry: {
              type: "Point",
              coordinates: [{{ $univ->longitude }}, {{ $univ->latitude }}],
            },
            properties: {
              title: "{{ $univ->nama }}",
              description: "{{ $univ->alamat }}",
              image:
                "{{ asset(Storage::url($univ->logo)) }}",
              icon: {
                iconUrl:
                  "{{ asset(Storage::url($univ->logo)) }}",
                iconSize: [40, 40], // size of the icon
                iconAnchor: [25, 25], // point of the icon which will correspond to marker's location
                popupAnchor: [0, -25], // point from which the popup should open relative to the iconAnchor
                className: "dot",
              },
            },
          },
        ],
      };

      // add markers to map
      geojson.features.forEach(function (marker) {
        // create a DOM element for the marker
        var el = document.createElement("div");
        el.className = "marker";
        el.style.backgroundImage =
          "url(" + marker.properties.icon.iconUrl + ")";
        el.style.width = marker.properties.icon.iconSize[0] + "px";
        el.style.height = marker.properties.icon.iconSize[1] + "px";
        el.style.backgroundSize = "100%";

        // add marker to map
        new mapboxgl.Marker(el)
          .setLngLat(marker.geometry.coordinates)
          .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
              .setHTML(
                "<p><strong>" +
                  marker.properties.title +
                  '</strong></p><p class="text-secondary">' +
                  marker.properties.description +
                  '</p><img src="' +
                  marker.properties.image +
                  '" class="w-100" alt="">'
              )
          )
          .addTo(map);
      });

      map.on("load", function () {
        geolocate.on("geolocate", function (e) {
          var lon = e.coords.longitude;
          var lat = e.coords.latitude;
          var position = [lon, lat];
          console.log(position);

          // make an initial directions request that
          // starts and ends at the same location
          getRoute(start);

          // Add starting point to the map
          map.addLayer({
            id: "point",
            type: "circle",
            source: {
              type: "geojson",
              data: {
                type: "FeatureCollection",
                features: [
                  {
                    type: "Feature",
                    properties: {},
                    geometry: {
                      type: "Point",
                      coordinates: start,
                    },
                  },
                ],
              },
            },
            paint: {
              "circle-radius": 10,
              "circle-color": "#3887be",
            },
          });

          var end = {
            type: "FeatureCollection",
            features: [
              {
                type: "Feature",
                properties: {},
                geometry: {
                  type: "Point",
                  coordinates: [lon, lat],
                },
              },
            ],
          };

          if (map.getLayer("end")) {
            map.getSource("end").setData(end);
          } else {
            map.addLayer({
              id: "end",
              type: "circle",
              source: {
                type: "geojson",
                data: {
                  type: "FeatureCollection",
                  features: [
                    {
                      type: "Feature",
                      properties: {},
                      geometry: {
                        type: "Point",
                        coordinates: [lon, lat],
                      },
                    },
                  ],
                },
              },
              paint: {
                "circle-radius": 10,
                "circle-color": "#f30",
              },
            });
          }
          map.setZoom(9);
          map.setCenter([lon, lat])

          getRoute([lon, lat]);
        });
        geolocate.trigger();
      });
    </script>
@endpush
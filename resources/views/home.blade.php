@extends('layouts.app-user')

@section('header')
<header>
    <!-- header inner -->
    <div class="header-top">
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
                      <li> <a href="#peta">Peta</a> </li>
                      <li> <a href="#cari">Cari Universitas</a> </li>
                      <li> <a href="#hubungi">Hubungi Kami</a> </li>
                      <li> <a href="#tentang">Tentang Kami</a> </li>
                      <li class="active"> <a href="{{ route('login') }}">Login</a> </li>
                     </ul>
                   </nav>
                 </div>
               </div> 
              </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->

     <!-- end header -->
     <section class="slider_section">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="text-bg pt-5">
                     <span>Selamat Datang di,</span>
                      <h1>Cari Univ App</h1>
                      <p class="text-bg pt-5">Cari informasi universitas favoritmu disini. Tanpa login serta bisa diakses kapanpun dan dimanapun. Menemukan informasi dengan mudah dan jangan lupa, Semangat!</p>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="images_box">
                      <figure><img src="{{ asset('Frontend/images/arcmap.png') }}"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption">

                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="text-bg pt-5">
                      <span>Hi,</span>
                      <h1>Calon Mahasiswa</h1>
                      <p class="text-bg pt-5">Semoga lulus seleksi sesuai universitas yang diinginkan. Berprestasi dan berproses di tempat baru sesuai universitas impianmu</p>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="images_box">
                      <figure><img src="{{ asset('Frontend/images/mahasiswa.png') }}"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="carousel-item">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="text-bg pt-5">
                      <span>Temukan,</span>
                      <h1>Jarak Uiversitas</h1>
                      <p class="text-bg pt-5">Kami akan menampilkan jarak universitas yang sesuai dengan jarak anda saat ini. Dengan itu, diharapkan dapat menentukan universitas pilihan sesuai jarak masing - masing</p>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="images_box">
                      <figure><img src="{{ asset('Frontend/images/jarak.png') }}"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</section>
</div>
</header>
@endsection

@section('content')
<!-- vegetable -->
<div id="peta" class="peta">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div  class="titlepage">
          <h2> Peta <strong class="llow">Persebaran</strong> </h2>
          <div class="row mt-3">
            <div class="col-12">
              <div id="map" style="width: 1100px; height: 550px"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end vegetable -->

<!-- cari univ -->
<div id="cari" class="cari">
  <div class="container">
   <div class="row">
     <div class="col-md-12">
        <div class="titlepage">
          <h2>Cari <strong class="llow">Universitas</strong></h2>
          <div class="container mb-5">
            <div class="row mt-5 mb-5">
              <div class="col-12">
                <!-- Nav tabs -->
                <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a
                      class="nav-item nav-link active"
                      id="home-tab"
                      data-toggle="tab"
                      href="#home"
                      role="tab"
                      aria-controls="home"
                      aria-selected="true"
                      >Search by Region</a
                    >
                    <a
                      class="nav-item nav-link"
                      id="settings-tab"
                      data-toggle="tab"
                      href="#settings"
                      role="tab"
                      aria-controls="settings"
                      aria-selected="false"
                      >Search by Keyword</a
                    >
                    <a
                      class="nav-item nav-link"
                      id="ilmu-tab"
                      data-toggle="tab"
                      href="#ilmu"
                      role="tab"
                      aria-controls="ilmu"
                      aria-selected="false"
                      >Search by Bidang Keilmuan</a
                    >
                </nav>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div
                    class="tab-pane fade show active"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab"
                  >
                    <div class="row align-items-center justify-content-center mt-4">
                      <div class="col-12 justify-content-center">
                        <form action="{{ route('home') }}" method="GET" id="locations" class="row align-items-center justify-content-center">
                          <div class="col-lg-4 justify-content-center">
                            <div class="form-group">
                              <label for="provinsi">Provinsi</label>
                              <select name="id_provinsi" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                              </select>
                              <select v-else class="form-control"></select>
                            </div>
                          </div>
                          <div class="col-lg-4 justify-content-center">
                            <div class="form-group">
                              <label for="kabupaten">Kabupaten</label>
                              <select name="id_kab_kota" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                              </select>
                              <select v-else class="form-control"></select>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mb-2 ml-2 mt-4">Search</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="settings"
                    role="tabpanel"
                    aria-labelledby="settings-tab"
                  >
                    <div class="row align-items-center mt-4">
                      <div class="col-lg-12 justify-content-center">
                        <form action="{{ route('home') }}" method="GET">
                          <div class="input-group">
                            <div class="form-inline ml-auto mr-auto">
                              <input
                                type="search"
                                id="keyword"
                                name="keyword"
                                class="form-control"
                                placeholder="Search"
                              />
                              <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="ilmu"
                    role="tabpanel"
                    aria-labelledby="ilmu-tab"
                  >
                  <div class="row align-items-center justify-content-center mt-4">
                    <div class="col-lg-6 justify-content-center">
                      <form action="{{ route('home') }}" method="GET">
                        <div class="form-group">
                          <label for="bidang_keilmuan">Bidang Keilmuan</label>
                          <select class="form-control" name="bidang_keilmuan" id="bidang_keilmuan">
                            <option value="Matematika dan Ilmu Pengetahuan Alam (MIPA)">Matematika dan Ilmu Pengetahuan Alam (MIPA)</option>
                            <option value="Ilmu Tanaman">Ilmu Tanaman</option>
                            <option value="Ilmu Hewani">Ilmu Hewani</option>
                            <option value="Ilmu Kedokteran">Ilmu Kedokteran</option>
                            <option value="Ilmu Kesehatan">Ilmu Kesehatan</option>
                            <option value="Ilmu Teknik">Ilmu Teknik</option>
                            <option value="Ilmu Ekonomi">Ilmu Ekonomi</option>
                            <option value="Ilmu Sosial Humaniora">Ilmu Sosial Humaniora</option>
                            <option value="Ilmu Agama dan Filsafat">Ilmu Agama dan Filsafat</option>
                            <option value="Seni, Desain dan Media">Seni, Desain dan Media</option>
                            <option value="Ilmu Pendidikan">Ilmu Pendidikan</option>
                          </select>
                        </div>       
                      </div>
                      <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary mt-2">Search</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if ($search_result != null)
              <div class="container mt-5">
                <h3 class="text-secondary mt-5 pt-5">Result serach for "{{ $search_result }}"</h3>
                <div class="row justify-content-center mt-5">
                  @if (count($univs) == 0)
                      <h5 class="text-secondary mt-5">No one 'universitas' was found</h5>
                  @endif
                  @foreach($univs as $univ)
                    <div class="col-lg-4 col-md-4 mb-5">
                      <div class="card shadow p-3 bg-white rounded">
                        <div class="row align-items-center">
                          <div class="col-4">
                            <img
                              src="{{ asset(Storage::url($univ->logo)) }}"
                              class="w-100"
                              alt=""
                            />
                          </div>
                          <div class="col-8">
                            <h6><b>{{ $univ->nama }}</b></h6>
                            <p class="text-secondary">{{ ucwords(strtolower($univ->kab_kota->name)) . ", " . ucwords(strtolower($univ->provinsi->name))  }}</p>
                            <a href="{{ route('home.detail', $univ->id) }}" class="btn btn-primary mt-2">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
          @endif
        </div>
     </div>
   </div>
  </div>
</div>
    <!-- end contact -->

<!-- contact -->
<div id="tentang" class="peta">
  <div class="container">
   <div class="row">
     <div class="col-md-12">
        <div class="titlepage">
          <h2>Tentang <strong class="llow">Kami</strong></h2>
        </div>
     </div>
     <div>
       <p>Masa – masa saat ini adalah masa dimana pendaftaran perguruan tinggi dibuka. Banyak calon mahasiswa baru yang mencari informasi mengenai universitas incarannya secara manual. Baik melalui website resmi ataupun informasi - informasi orang diluar sana. Dikarenakan banyaknya informasi yang nantinya akan diperoleh calon mahasiswa baru, tentu akan membuatnya sedikit bingung dan banyak opini yang dia dapatkan. Sehingga informasi tersebut akan lebih baik untuk dipusatkan dengan tingkat kebenaran yang tinggi untuk masing – masing data informasi universitasnya.</p>
       <br><p>Dengan adanya permasalah tersebut, memunculkan ide untuk membuat Sistem Informasi Geografis guna memudahkan pencarian nama – nama universitas beserta informasi penting dari masing – masing universitas. Dengan adanya sistem informasi geografis ini diharapkan dapat mempermudah calon mahasiswa baru untuk memperoleh data yang ingin dia dapatkan dengan lebih mudah, efisien, dan terpercaya. </p>
     </div>
   </div>
  </div>
</div>
    <!-- end contact -->

<!-- contact -->
<div id="hubungi" class="contact">
  <div class="container">
   <div class="row">
     <div class="col-md-12 pt-5">
                <div class="titlepage">
                  <h2>Hubungi <strong class="llow">Kami</strong></h2>
                </div>
   </div>

</div>
    <div class="white_color">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
           <form class="contact_bg">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 form">
                  <h5 class="title"><b>Kelompok 5</b></h5>
                  <p>Jl. Gajayana No.50, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur</p>
                  <p class="pt-5"><b>65144</b></p>
                  <p class="pt-5">+6285209187654</p>
                  <p>cariunivapp@gmail.com</p>
                </div>
              </div>
            </form>
          </div>
            </div>
      
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div id="map-contact" style="width: 535px; height: 350px">
          </div>
          </div>
           </div>
          </div>
        </div>

      </div>
    </div>
</div>
</div>
    <!-- end contact -->
@endsection

@push('addon-script')
    <script src="{{ asset('Frontend/vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
            this.getProvincesData();
        },
        data: {
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null,
        },
        methods: {
            getProvincesData() {
                var self = this;
                axios.get('{{ route('api-provinces') }}')
                    .then(function(response) {
                        self.provinces = response.data;
                    });
            },
            getRegenciesData() {
                var self = this;
                axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response) {
                        self.regencies = response.data;
                    });
            },
        },
        watch: {
            provinces_id: function(val, oldVal) {
                this.regencies_id = null;
                this.getRegenciesData();
            }
        },
      });
    </script>
    
    <script type="text/javascript">
      mapboxgl.accessToken =
        "pk.eyJ1IjoibGluZ2dhd2FoeXUiLCJhIjoiY2tuYzBsdTI3MXZoNDJ2bGdsMXZzcmszbCJ9.2-I9dM3g_HpoPcFbZzU9qQ";

      var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        center: [112.60767, -7.952371],
        zoom: 14,
      });

      var map_contact = new mapboxgl.Map({
        container: "map-contact",
        style: "mapbox://styles/mapbox/streets-v11",
        center: [112.60767, -7.952371],
        zoom: 14,
      });

      var marker1 = new mapboxgl.Marker()
          .setLngLat([112.60767, -7.952371])
          .addTo(map_contact);

      var geojson = {
        type: "FeatureCollection",
        features: [
          @foreach($univs as $univ)
            {
              type: "Feature",
              geometry: {
                type: "Point",
                coordinates: [{{ $univ->longitude }}, {{ $univ->latitude }}],
              },
              properties: {
                id: "{{ $univ->id }}",
                title: "{{ $univ->nama }}",
                description: "{{ $univ->alamat }}",
                image:
                  "{{ asset(Storage::url($univ->logo)) }}",
                icon: {
                  iconUrl:
                    "{{ asset(Storage::url($univ->logo)) }}",
                  iconSize: [40, 40],
                  iconAnchor: [25, 25], 
                  popupAnchor: [0, -25],
                  className: "dot",
                },
              },
            },
          @endforeach
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
                "<h5><b>" +
                  marker.properties.title +
                  '</b></h5><p class="text-secondary">' +
                  marker.properties.description +
                  '</p><img src="' +
                  marker.properties.image +
                  '" class="w-75 ml-3" alt=""><br><br></a><a href="http://127.0.0.1:8000/univ/' + marker.properties.id + '" class="btn btn-primary">Detail</a>'
              )
          )
          .addTo(map);
      });
    </script>
@endpush
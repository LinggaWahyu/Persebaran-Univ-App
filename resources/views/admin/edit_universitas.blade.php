@extends('layouts/admin')

@section('title', 'Admin | Edit Univ')
@section('container')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Universitas</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit Data Universitas Cari Univ App</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/universitas/{{$univ->id}}" enctype="multipart/form-data"method="POST">
                      @method('put')
                      @csrf
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Nama Univ</span>
                          </div>
                          <input type="text" class="form-control" name="nama" placeholder="Nama Univ" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->nama }}">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Alamat</span>
                          </div>
                          <input type="text" class="form-control" name="alamat" placeholder="Alamat" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->alamat }}">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Provinsi</span>
                          </div>
                          <select name="id_provinsi" class="custom-select">
                            <option value="1">Jawa Timur</option>
                            <option value="2">Jawa Tengah</option>
                            <option value="3">Jawa Barat</option>
                          </select>
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 140px;">Kabupaten/Kota</span>
                          </div>
                          <select name="id_kab_kota" class="custom-select">
                            <option value="1">Malang</option>
                            <option value="2">Blitar</option>
                            <option value="3">Probolinggo</option>
                          </select>
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Link Web</span>
                          </div>
                          <input type="text" name="link_web" class="form-control" placeholder="Link Website Univ" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->link_web }}">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">No. Telp</span>
                          </div>
                          <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->no_telp }}">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 145px;">Jumlah Mahasiswa</span>
                          </div>
                          <input type="number" name="jumlah_mahasiswa" class="form-control" placeholder="Jumlah Mahasiswa" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->jumlah_mahasiswa }}">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Logo</span>
                          </div>
                          <input type="file" name="logo" class="form-control" placeholder="Logo" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" for="status" style="width: 120px;">Status</span>
                          </div>
                          <select class="custom-select" id="status" name="status">
                            <option value="Kementerian Riset dan Pendidikan Tinggi">Kementerian Riset dan Pendidikan Tinggi</option>
                            <option value="Kementerian Agama">Kementerian Agama</option>
                            <option value="Kementerian Kesehatan">Kementerian Kesehatan</option>
                            <option value="Kementerian Komunikasi dan Informatika">Kementerian Komunikasi dan Informatika</option>
                          </select>
                      </div>
                      <div class="input-group form-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" for="inputGroupSelect01" style="width: 140px;">Bidang Keilmuan</span>
                          </div>
                          <div class="form-check ml-3 mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[0]" type="checkbox" value="Matematika dan Ilmu Pengetahuan Alam (MIPA)">
                            <label class="form-check-label" for="defaultCheck1">
                              Matematika dan Ilmu Pengetahuan Alam (MIPA)
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[1]" type="checkbox" value="Ilmu Tanaman">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Tanaman
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[2]" type="checkbox" value="Ilmu Hewani">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Hewani
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[3]" type="checkbox" value="Ilmu Kedokteran">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Kedokteran
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[4]" type="checkbox" value="Ilmu Kesehatan">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Kesehatan
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[5]" type="checkbox" value="Ilmu Teknik">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Teknik
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[6]" type="checkbox" value="Ilmu Ekonomi">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Ekonomi
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[7]" type="checkbox" value="Ilmu Sosial Humaniora">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Sosial Humaniora
                            </label>
                          </div>
                          <div class="form-check mr-3" style="margin-left: 155px;">
                            <input class="form-check-input" name="bidang_keilmuan[8]" type="checkbox" value="Ilmu Agama dan Filsafat">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Agama dan Filsafat
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[9]" type="checkbox" value="Seni, Desain dan Media">
                            <label class="form-check-label" for="defaultCheck1">
                              Seni, Desain dan Media
                            </label>
                          </div>
                          <div class="form-check mr-3">
                            <input class="form-check-input" name="bidang_keilmuan[10]" type="checkbox" value="Ilmu Pendidikan">
                            <label class="form-check-label" for="defaultCheck1">
                              Ilmu Pendidikan
                            </label>
                          </div>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-6">
                          <div id="map" style="width: 550px; height: 250px"></div>
                        </div>
                      </div>
                      <div class="input-group mb-3 mt-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Latitude</span>
                          </div>
                          <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->latitude }}">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 120px;">Longitude</span>
                          </div>
                          <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" aria-label="Username" aria-describedby="basic-addon1" value="{{ $univ->longitude }}">
                      </div>
                      <input class="btn btn-primary" type="submit" value="Submit" style="float:right">
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<script type="text/javascript">
    mapboxgl.accessToken =
        "pk.eyJ1IjoibGluZ2dhd2FoeXUiLCJhIjoiY2tuYzBsdTI3MXZoNDJ2bGdsMXZzcmszbCJ9.2-I9dM3g_HpoPcFbZzU9qQ";

      var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        center: [112.60767, -7.952371],
        zoom: 14,
      });

      var marker = new mapboxgl.Marker();

      map.on('click', function(e) {
        marker.remove();
        
        $(function () {
          $('#latitude').val(e.lngLat["lat"]);
          $('#longitude').val(e.lngLat["lng"]);
        });

        marker.setLngLat(e.lngLat).addTo(map);
      });
  </script>
@endsection
  
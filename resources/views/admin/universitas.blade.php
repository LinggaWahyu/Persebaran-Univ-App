@extends('layouts/admin')

@section('title', 'Admin | Data Univ')
@section('container')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Universitas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 mt-3 text-right">
              <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/universitas/create">Tambah Universitas</a>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif
      @if (session('edit'))
      <div class="alert alert-primary">
          {{ session('edit') }}
      </div>
      @endif
      @if (session('hapus'))
      <div class="alert alert-danger">
          {{ session('hapus') }}
      </div>
      @endif
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Universitas Cari Univ App</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Logo</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Provinsi</th>
                      <th>Kabupaten/Kota</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Link Website</th>
                      <th>No. Telepon</th>
                      <th>Status</th>
                      <th>Bidang Keilmuan</th>
                      <th>Jumlah Mahasiswa</th>
                      <th width="70px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($univ as $unv)
                      <tr>
                        <td><img src="https://kadowisudaku.com/wp-content/uploads/2020/04/UIN-Maulana-Malik-Ibrahim-Malang.png" class="w-50" alt=""></td>
                        <td>{{$unv->nama}}</td>
                        <td>{{$unv->alamat}}</td>
                        <td>{{$unv->provinsi}}</td>
                        <td>{{$unv->kab_kota}}</td>
                        <td>{{$unv->latitude}}</td>
                        <td>{{$unv->longitude}}</td>
                        <td><a href="{{$unv->link_web}}" target="_blank">{{$unv->link_web}}</a></td>
                        <td>{{$unv->no_telp}}</td>
                        <td>{{$unv->status}}</td>
                        <td><ul>
                          <li>Matematika dan Ilmu Pengetahuan Alam (MIPA)</li>
                          <li>Ilmu Kedokteran</li>
                          <li>Ilmu Kesehatan</li>
                          <li>Ilmu Teknik</li>
                          <li>Ilmu Bahasa</li>
                          <li>Agama dan Filsafat</li>
                          <li>Ilmu Pendidikan</li>
                        </ul></td>
                        <td>{{$unv->jumlah_mahasiswa}}</td>
                        <td class="text-center">
                          <a href="/universitas/{{ $unv->id }}/edit" class="btn btn-primary" title="Edit"><i class="fas fa-pen" style="font-size: 12px"></i></a>
                          <form action="/universitas/{{ $unv->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit"class="btn btn-danger"><i class="fas fa-trash" style="font-size: 12px"></i></button>
                          </form>
                          <!-- <a href="#" class="btn btn-danger" title="Hapus"><i class="fas fa-trash" style="font-size: 12px"></i></a> -->
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
@endsection

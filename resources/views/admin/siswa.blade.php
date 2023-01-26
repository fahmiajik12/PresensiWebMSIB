@extends('layouts.header')
@section('isi')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Halo Siswa </h1>
  </div>
  <div class="row">
        <div class="col-xl-4 col-md-4 mb-4">
          <a href="{{ route('jadwal.index') }}" style="text-decoration:none;">
              <div class="card border-left-secondary shadow h-100 py-2 bg-secondary">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Jadwal Aktif</div>
                          <div class="h5 mb-0 font-weight-bold text-white">{{ $jadwal }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-white"></i>
                      </div>
                      </div>
                  </div>
              </div>
          </a>
      </div>
      <div class="col-xl-4 col-md-4 mb-4">
          <a href="{{ route('presensi.index') }}" style="text-decoration:none;">
              <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Rekap Presensi</div>
                          <div class="h5 mb-0 font-weight-bold text-white">{{ $presensi }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-book fa-2x text-white"></i>
                      </div>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  </div>
</div> 

@endsection
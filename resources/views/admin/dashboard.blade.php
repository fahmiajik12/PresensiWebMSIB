@extends('layouts.header')
@section('isi')
@if(Auth::user()->role == 'admin')
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
      <h1 class="h3 mb-0 text-gray-800">Halo Admin</h1>
  </div>
  <div class="row">
      <div class="col-xl-4 col-md-4 mb-4">
          <a href="{{ route('guru.index') }}" style="text-decoration:none;">
              <div class="card border-left-danger shadow h-100 py-2 bg-danger">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Guru</div>
                          <div class="h5 mb-0 font-weight-bold text-white">{{ $guru }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fa fa-users fa-2x text-white"></i>
                      </div>
                      </div>
                  </div>
              </div>
          </a>
      </div>
      <div class="col-xl-4 col-md-4 mb-4">
          <a href="{{ route('management.index') }}" style="text-decoration:none;">
              <div class="card border-left-success shadow h-100 py-2 bg-success">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah User</div>
                          <div class="h5 mb-0 font-weight-bold text-white">{{ $user }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-users fa-2x text-white"></i>
                      </div>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  </div>
</div>
@elseif(Auth::user()->role == 'guru')
  @include('admin.guru')
@else
  @include('admin.siswa')
@endif
@endsection
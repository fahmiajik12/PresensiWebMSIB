@extends('layouts.header')
@section('isi')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Kelas</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="text-center mt-4">Daftar Kelas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0 mr-3 ml-3">
        <a class="btn btn-primary btn-sm mb-3" title="Tambah Kelas" href=" {{ route('kelas.create') }}">
            <i class="fa fa-plus"></i> Tambah Kelas
        </a>
      <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                <th width="40">NO</th>
                <th>KODE KELAS</th>
                <th>NAMA KELAS</th>
                </tr>
            </thead>
            <tbody>
                @if (count ($kelas))
                    @foreach ($kelas as $key => $class)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $class->kode_kelas }}</td>
                            <td>{{ $class->nama_kelas }}</td>
                           
                        </tr>
                    @endforeach
                @endif
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
</div>
  @endsection
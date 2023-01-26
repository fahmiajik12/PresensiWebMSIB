@extends('layouts.header')
@section('isi')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Presensi</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="text-center mt-4">Daftar Presensi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
         <p>{{ $message }}</p>
      </div>
     @endif
     <div class="card-body p-0 ml-3 mr-3">
      @if(Auth::user()->role == 'admin' or Auth::user()->role == 'guru')
        <a class="btn btn-danger btn-sm mb-3 text-right" title="Download PDF" href=" {{ url('presensipdf') }}">
          <i class="fa fa-file-pdf"></i>
        </a> &nbsp;
      @endif
    </div>
      <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                <th width="40">NO</th>
                <th>HARI</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>MATA PELAJARAN</th>
                <th>NAMA PENGAJAR</th>
                <th>STATUS</th>
                @if(Auth::user()->role == 'admin' or Auth::user()->role == 'guru')
                <th>AKSI</th>
                @endif
                </tr>
            </thead>
            <tbody>
              @if (count ($presensi))
              @foreach ($presensi as $key => $absensi)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $absensi->hari }}, {{ ($absensi->jam_pelajaran) }}</td>     
                    <td>{{ $absensi->nama }}</td> 
                    <td>{{ $absensi->nama_kelas }}</td>  
                    <td>{{ $absensi->nama_mapel }}</td>
                    <td>{{ $absensi->pengajar }}</td>
                    <td>{{ $absensi->status }}</td>
                    @if(Auth::user()->role == 'admin' or Auth::user()->role == 'guru')
                    <td>
                      <form method="POST" action="{{ route('presensi.destroy',$absensi->id) }}">
                        @csrf
                        @method('DELETE')
                        &nbsp;
                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                            onclick="return confirm('Anda Yakin Data akan diHapus?')">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </td>
                     @endif
                    </tr>
                    @endforeach
                    @endif
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div>
    <!-- /.card-footer -->
  </div>
  @endsection
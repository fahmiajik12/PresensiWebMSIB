@extends('layouts.header')
@section('isi')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jadwal</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.card-header -->
    <div class="card">
      <div class="card-header border-transparent">
        <h3 class="text-center mt-4">JADWAL PELAJARAN</h3>
      </div>
     
    <div class="card-body p-0"> 
      <div class="card-body p-0 ml-3 mr-3">
        @if(Auth::user()->role == 'guru')
          <a class="btn btn-primary btn-sm mb-3" title="Tambah Jadwal" href=" {{ route('jadwal.create') }}">
            <i class="fa fa-plus"></i> Tambah Jadwal
          </a>&nbsp;&nbsp;
          <a class="btn btn-danger btn-sm mb-3 text-right" title="Download PDF" href=" {{ url('jadwalpdf') }}">
            <i class="fa fa-file-pdf"></i>
          </a> &nbsp;
          @elseif(Auth::user()->role == 'siswa')
          <a class="btn btn-success btn-sm mb-3" title="Absen" href=" {{ route('presensi.create') }}">
            <i class="fa fa-fingerprint"></i> Absen
          </a> &nbsp;
          @endif
      </div>
      <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                <th width="40">NO</th>
                <th>MATA PELAJARAN</th>
                <th>KELAS</th>
                <th>PENGAJAR</th>
                <th>HARI</th>
                <th>JAM</th>
                @if(Auth::user()->role == 'admin' or Auth::user()->role == 'guru')
                <th>AKSI</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @if (count($jadwals))
                    @foreach ($jadwals as $key => $jadwal)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $jadwal->nama_mapel }}</td>
                            <td>{{ $jadwal->kelas->nama_kelas }}</td>
                            <td>{{ $jadwal->guru->nama }}</td>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->jam_pelajaran }}</td>
                            @if(Auth::user()->role == 'guru')
                            <td>
                            <form method="POST" action="{{ route('jadwal.destroy',$jadwal->id) }}">
                            @csrf
                            @method('DELETE')
                            
                            &nbsp;
                            <a class="btn btn-warning btn-sm" title="Ubah Jadwal"
                                href=" {{ route('jadwal.edit',$jadwal->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pegawai"
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
@extends('layouts.header')
@section('isi')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Siswa</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="card">
   
      <h3 class="text-center mt-4">Data Siswa</h3>
   
    <!-- /.card-header -->
    <div class="card-body p-0 mr-2 ml-2">
        <a class="btn btn-primary btn-sm mb-3" title="Tambah siswa" href=" {{ route('siswa.create') }}">
            <i class="fa fa-plus"></i> Tambah Siswa
        </a>
        
    <a class="btn btn-success btn-sm mb-3 text-right" title="Export Excel" href=" {{ url('siswa-excel') }}">
      <i class="fa fa-file-excel"></i>
    </a> &nbsp;
      <div class="table-responsive">
        @if ($message = Session::get('success'))
           <div class="alert alert-success">
           <p>{{ $message }}</p>
           </div>
        @endif
        <table class="table m-1">
            <thead>
                <tr>
                <th width="40">NO</th>
                <th>NIS</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>TTL</th>
                <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @if (count ($siswa))
                    @foreach ($siswa as $key => $student)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->nama }}</td>
                            <td>{{ ucwords($student->gender) }}</td>
                            <td>{{ $student->tempat_lahir }}, {{ Carbon\Carbon::parse($student->tgl_lahir)->format('d F Y') }}</td>
                            <td>
                                <form method="POST" action="{{ route('siswa.destroy',$student->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info btn-sm" title="Detail Siswa"
                                        href=" {{ route('siswa.show',$student->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    &nbsp;
                                    <a class="btn btn-warning btn-sm" title="Ubah Siswa"
                                        href=" {{ route('siswa.edit',$student->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Siswa"
                                        onclick="return confirm('Anda Yakin Data akan Menghapus Siswa atas Nama {{ $student->nama }}?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
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
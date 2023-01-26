@extends('layouts.header')
@section('isi')
@include('sweetalert::alert')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Guru</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="card">
    <h3 class="text-center mt-4">Data Guru</h3>

   
    <!-- /.card-header -->
    <div class="card-body p-0 ml-2 mr-2">
      @if(Auth::user()->role == 'admin')
      <a class="btn btn-primary btn-sm mb-3" title="Tambah Guru" href=" {{ route('guru.create') }}">
        <i class="fa fa-plus"></i> Tambah Guru
    </a>@endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
</div>
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>TEMPAT TANGGAL LAHIR</th>
            <th>AKSI</th>
          </tr>
          </thead>
          <tbody>
            @if (count ($guru))
               @foreach ($guru as $key => $pengajar)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $pengajar->nip }}</td>
                    <td>{{ $pengajar->nama }}</td>
                    <td>{{ ucwords($pengajar->gender) }}</td>
                    <td>{{ $pengajar->tempat_lahir }}, {{ Carbon\Carbon::parse($pengajar->tgl_lahir)->format('d F Y') }}</td>
                    <td>
                        <form method="POST" action="{{ route('guru.destroy',$pengajar->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm" title="Detail Pegawai"
                                href=" {{ route('guru.show',$pengajar->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            &nbsp;
                            @if(Auth::user()->role == 'admin')
                            <a class="btn btn-warning btn-sm" title="Ubah Pegawai"
                                href=" {{ route('guru.edit',$pengajar->id) }}">
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
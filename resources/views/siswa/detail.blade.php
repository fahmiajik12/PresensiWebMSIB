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
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">                                        
                    <h2>{{ $row->nama }}</h2>                                   
                </div>
                <div class="card-body">
                    <div class="alert alert-secondary">
                        NIP &nbsp;:&nbsp; {{ $row->nis }}                        
                        <br />Jenis Kelamin&nbsp;:&nbsp; {{ $row->gender }}
                        <br />Tempat Lahir&nbsp;:&nbsp; {{ $row->tempat_lahir }}
                        <br />Tanggal Lahir&nbsp;:&nbsp; {{ $row->tgl_lahir }}
                        <br />Nama Orang Tua&nbsp;:&nbsp; {{ $row->nama_ortu }}
                        <br />No Telp&nbsp;:&nbsp; {{ $row->phone_number }}
                        <br />Email&nbsp;:&nbsp; {{ $row->email }}                        
                        <br />Alamat&nbsp;: &nbsp;{{ $row->alamat }}
                    </div>
                    <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('siswa') }}">
                        <i class="fa fa-arrow-left"></i>Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection
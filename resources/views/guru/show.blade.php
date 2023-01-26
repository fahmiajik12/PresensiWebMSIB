@extends('layouts.header')

@section('isi')
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
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">                    
                    @empty($row->foto)
                    <img src="{{ url('public/img/guru/nophoto.png') }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ url('public/img/guru')}}/{{$row->foto}}" alt="Profile" class="rounded-circle" width="100">
                    @endempty
                    <h2>{{ $row->nama }}</h2>                                   
                </div>
                <div class="card-body ml-5">
                    <div class="card ml-5 mr-5" >
                        &nbsp;&nbsp;NIP &nbsp;: &nbsp;{{ $row->nip }}                        
                        <br />&nbsp;&nbsp;Jenis Kelamin&nbsp;&nbsp;:&nbsp; {{ $row->gender }}
                        <br />&nbsp;&nbsp; Lahir&nbsp;:&nbsp; {{ $row->tempat_lahir }}
                        <br />&nbsp;&nbsp;Tanggal Lahir&nbsp;:&nbsp; {{ $row->tgl_lahir }}
                        <br />&nbsp;&nbsp;No Telp&nbsp;:&nbsp; {{ $row->phone_number }}
                        <br />&nbsp;&nbsp;Email&nbsp;: &nbsp;{{ $row->email }}
                        <br />&nbsp;&nbsp;Pendidikan Terakhir&nbsp;:&nbsp; {{ $row->pendidikan }}
                        <br />&nbsp;&nbsp;Alamat: &nbsp;{{ $row->alamat }}
                    </div>
                    <a class="btn btn-info btn-sm ml-5" title="Kembali" href=" {{ url('guru') }}">
                        <i class="fa fa-arrow-left"></i>Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
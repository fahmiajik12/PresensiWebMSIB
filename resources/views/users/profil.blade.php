@extends('layouts.header')

@section('isi')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
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
                    <img src="{{ url('public/img/nophoto.png') }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ asset('public/user')}}/{{$row->foto}}" alt="Profile" class="rounded-circle" width="100">
                    @endempty 
                    <h2>{{ $row->name }}</h2> 
                    <h5>{{ $row->role }}</h2>    
                        <a class="fa fa-edit" href="{{ route('profile.edit', $row->id) }}">edit profile</a>                               
                </div>
                <div class="card-body ml-5">
                    <div class="card ml-5 mr-5" >
                        &nbsp;&nbsp;Email &nbsp;: &nbsp;{{ $row->email }}                        
                        <br />&nbsp;&nbsp;Status&nbsp;&nbsp;:&nbsp; {{ $row->isactive }}
                        <br />&nbsp;&nbsp;Password &nbsp;:&nbsp; {{ $row->password }}
                    </div>
                    <a class="btn btn-info btn-sm ml-5" title="Kembali" href=" {{ url('/dashboard') }}">
                        <i class="fa fa-arrow-left"></i>Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
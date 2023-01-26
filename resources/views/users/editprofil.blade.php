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
 <h3 class="text-center mt-4">Form Edit</h3>
     <div class="card-body">                                                                 
    <section class="section profile">
        <form method="POST" action="{{ route('profile.update',$row->id) }}" enctype="multipart/form-data">
            @csrf     
            @method('PUT') 
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">                    
                            @empty($row->foto)
                            <img src="{{ url('public/img/nophoto.png') }}" alt="Profile" class="rounded-circle">
                            @else
                            <img src="{{ asset('public/user')}}/{{$row->foto}}" alt="Profile" class="rounded-circle" width="100">
                            @endempty 
                            <input class="fa fa-edit" title="ganti foto" type="file" name="foto">
                            <br>
                            <h2 class="fa fa-edit"><input class="fa fa-edit text-center bg-gray text-white" title="ubah nama" type="text" value="{{ $row->name }}" name="name"></h2> 
                            <h5>{{ $row->role }}</h2>                                   
                        </div>
                        <div class="card-body ml-5">
                            <div class="card ml-5 mr-5" >
                                &nbsp;&nbsp;Email &nbsp;: &nbsp;{{ $row->email }}                        
                                <br />&nbsp;&nbsp;Status&nbsp;&nbsp;:&nbsp; {{ $row->isactive }}
                                <br />&nbsp;&nbsp;Password &nbsp;:&nbsp;{{ $row->password }}
                            </div>
                            <a class="btn btn-danger btn-sm ml-5" title="Kembali" href=" {{ route('management.show',Auth::user()->id) }}">
                                &nbsp;<i class="fa fa-arrow-left"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-success btn-sm ml-5" title="Kembali">
                                &nbsp;<i class="fa fa-save"></i>simpan
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
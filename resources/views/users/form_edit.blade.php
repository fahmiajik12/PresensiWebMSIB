@extends('layouts.header')
@section('isi')
@php
$role = ['admin','guru','siswa'];
$status = ['Active','NotActive'];
@endphp
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Management User</h1>
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h3 class="text-center mt-4">Form Edit</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('management.update',$row->id) }}" >
                        @csrf     
                        @method('PUT')                                                                  
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$row->name}}">
                            </div>
                        </div>                                                
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="{{$row->email}}">
                            </div>
                        </div>                                                
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">                                
                                <input type="password" name="password" class="form-control" value="{{$row->password}}">
                            </div>
                        </div>         
                        <fieldset class="row mb-3">
                            <label class="col-form-label col-sm-2 pt-0">Role</label>
                            <div class="col-sm-10">
                                @foreach($role as $bagian)
                                @php $cek = ($bagian == $row->role) ? 'checked' : ''; @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="{{ $bagian }}" {{ $cek }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $bagian }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </fieldset> 
                        <fieldset class="row mb-3">
                            <label class="col-form-label col-sm-2 pt-0">Status</label>
                            <div class="col-sm-10">
                                @foreach($status as $aktif)
                                @php $cek = ($aktif == $row->isactive) ? 'checked' : ''; @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="isactive" value="{{ $aktif }}" {{ $cek }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $aktif }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </fieldset>                                                                                     
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('siswa') }}">
                                <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Pegawai"><i
                                        class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
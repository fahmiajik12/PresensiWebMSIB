@extends('layouts.header')

@section('isi')
@php
$ar_gender = ['laki-laki','perempuan'];
//select option divisi dan jabatan
@endphp
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
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h3 class="text-center mt-4">Form Edit Guru</h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('guru.update',$row->id) }}" enctype="multipart/form-data">
                        @csrf     
                        @method('PUT')                   
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" name="nip" class="form-control" value="{{$row->nip}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" value="{{$row->nama}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tempat_lahir" class="form-control" value="{{$row->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_lahir" class="form-control" value="{{$row->tgl_lahir}}">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                @foreach($ar_gender as $gender)
                                @php $cek = ($gender == $row->gender) ? 'checked' : ''; @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" 
                                           value="{{ $gender }}" {{ $cek }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="inputPhone" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control" value="{{$row->phone_number}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">                                
                                <input type="email" name="email" class="form-control" value="{{$row->email}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" style="height: 100px">{{$row->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-10">
                                <input type="text" name="pendidikan" class="form-control" value="{{$row->pendidikan}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="foto">
                                @if(!empty($row->foto)) <img src="{{ url('public/img/guru')}}/{{$row->foto}}" 
                                                             width="10%" class="img-thumbnail">
                                <br/>{{$row->foto}}
                                @endif
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('guru') }}">
                                    <i class="fa fa-arrow-left"> Kembali</i>
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
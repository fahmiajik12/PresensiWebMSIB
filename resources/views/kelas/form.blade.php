@extends('layouts.header')

@section('isi')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kelas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h3 class="text-center mt-4 ">Form Input Kelas</h3>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('kelas.store') }}" >
                        @csrf                                                                   
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" name="kode_kelas" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kelas" class="form-control" >
                            </div>
                        </div>                                                
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('kelas') }}">
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
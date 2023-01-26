@extends('layouts.header')
@section('isi')
<section class="section">
    @php
    $rs1 = App\Models\Kelas::all();
    $rs2 = App\Models\Guru::all();
    $ar_hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    @endphp
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                   <h3 class="text-center">Form Input Jadwal</h3>
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
                    <form method="POST" action="{{ route('jadwal.store')}}">
                        @csrf                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Kelas</label>
                                <select name="kelas_id">
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach ($rs1 as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_mapel" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pengajar</label>
                            <select name="guru_id">
                                <option value="">--Pilih Pengajar--</option>
                                @foreach ($rs2 as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Hari</label>
                            <div class="col-sm-10">
                                    @foreach($ar_hari as $hari)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="hari" value="{{ $hari }}">
                                        <label class="form-check-label" for="gridRadios1">
                                            {{ $hari }}
                                        </label>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jam Pelajaran</label>
                            <div class="col-sm-10">
                                <input type="text" name="jam_pelajaran" class="form-control">
                                <br>                        
                                <a class="btn btn-info" title="Kembali" href=" {{ url('jadwal') }}">
                                    <i class="fa fa-arrow-left-square"> Batal</i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan"><i
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
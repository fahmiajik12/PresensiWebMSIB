@extends('layouts.header')

@section('isi')
@php
    $rs1 = App\Models\Kelas::all();
    $rs2 = App\Models\Guru::all();
    $ar_hari = ['Senin','Selasa','rabu','kamis','jumat','sabtu'];
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
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h3 class="text-center mt-4">Form Edit Jadwal</h3>
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
                    <form method="POST" action="{{ route('jadwal.update',$row->id) }}" >
                        @csrf     
                        @method('PUT')                                                                  
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Kelas</label>
                                <select name="kelas_id">
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach ($rs1 as $kelas)
                                    {{-- edit kelas --}}
                                    @php 
                                        $sel = ($kelas->id == $row->kelas_id) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $kelas->id }}" {{ $sel }}>{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                            <div class="col-sm-2">
                                <input type="text" name="nama_mapel" class="form-control" value="{{ $row->nama_mapel }}">
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pengajar</label>
                            <select name="guru_id">
                                <option value="">--Pilih Pengajar--</option>
                                @foreach ($rs2 as $guru)
                                 {{-- edit guru --}}
                                 @php 
                                 $sel = ($guru->id == $row->guru_id) ? 'selected' : '';
                                 @endphp
                                <option value="{{ $guru->id }}" {{ $sel }}>{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Hari</label>
                            <div class="col-sm-10">
                                    @foreach($ar_hari as $day)
                                     {{-- edit guru --}}
                                     @php $cek = ($day == $row->hari) ? 'checked' : ''; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input bg-red" type="radio" name="hari" {{ $cek }} value="{{ $day }}">
                                        <label class="form-check-label" for="gridRadios1">
                                            {{ $day }}
                                        </label>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jam Pelajaran</label>
                            <div class="col-sm-10">
                                <input type="text" name="jam_pelajaran" class="form-control" value="{{ $row->jam_pelajaran }}">
                                <br>                        
                                <a class="btn btn-info" title="Kembali" href=" {{ url('jadwal') }}">
                                    <i class="fa fa-arrow-left-square"> Batal</i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan"><i
                                        class="fa fa-save"></i> Ubah</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection
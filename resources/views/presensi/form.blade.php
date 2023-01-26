@extends('layouts.header')
@section('isi')
@php 
$rs1 = App\Models\Siswa::all();
$rs2 = App\Models\Jadwal::all();
$rs3 = App\Models\Kelas::all();
@endphp
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Presensi</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h3 class="text-center mt-4">Absensi</h3>
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
                    <form method="POST" action="{{ route('presensi.store') }}" >
                        @csrf    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <select name="siswa_id">
                                    <option value="">--Nama siswa--</option>
                                    @foreach ($rs1 as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select name="kelas_id">
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach ($rs3 as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                                                
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                              <select name="jadwal_id">
                                  <option value="">--pilih mapel--</option>
                                  @foreach ($rs2 as $jadwal)
                                  <option value="{{ $jadwal->id }}">{{ $jadwal->nama_mapel }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">STATUS</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Hadir">
                                <label class="form-check-label" for="inlineRadio1">Hadir</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Izin">
                                <label class="form-check-label" for="inlineRadio2">Izin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Sakit">
                                <label class="form-check-label" for="inlineRadio1">Sakit</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Alpha">
                                <label class="form-check-label" for="inlineRadio2">Alpha</label>
                            </div>
                        </div>
                                                                       
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('jadwal') }}">
                                    <i class="fa fa-arrow-left"> Batal </i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Pegawai"><i
                                        class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>


                
                </div>
            </div>

        </div>
    </div>
</section>



@endsection
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
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                   <h3 class="text-center">Form Input Guru</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('guru.store')}}" enctype="multipart/form-data">
                        @csrf                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" name="nip" value="{{ old('nip') }}" 
                                class="form-control  @error ('nip') is-invalid @enderror">
                                @error('nip')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="{{ old('nama') }}" 
                                class="form-control  @error ('nama') is-invalid @enderror">
                                @error('nama')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" 
                                class="form-control  @error ('tempat_lahir') is-invalid @enderror">
                                @error('tempat_lahir')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" 
                                class="form-control  @error ('tgl_lahir') is-invalid @enderror">
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <div class="col-sm-2 col-form-label">Jenis Kelamin</div>
                            <div class="col-sm-10">
                                @foreach($ar_gender as $gender)
                                @php 
                                $sel = (old('gender') == $gender)? 'checked' : '';
                                    
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input @error ('gender') is-invalid @enderror" type="radio" name="gender" value="{{ $gender }}" {{ $sel }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                                @error('gender')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhone" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}" 
                                class="form-control  @error ('phone_number') is-invalid @enderror">
                                @error('phone_number')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">                                
                                <input type="text" name="email" value="{{ old('email') }}" 
                                class="form-control  @error ('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error ('alamat') is-invalid @enderror "  name="alamat" style="height: 100px"> {{ old('alamat') }} </textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-10">
                                <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" 
                                class="form-control  @error ('pendidikan') is-invalid @enderror">
                                @error('pendidikan')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="foto" value="{{ old('foto') }}" 
                                class="form-control  @error ('foto') is-invalid @enderror">
                                @error('foto')
                                <div class="invalid-feedback">
                                     {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('pegawai') }}">
                                    <i class="fa fa-arrow-left-square"> Kembali</i>
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
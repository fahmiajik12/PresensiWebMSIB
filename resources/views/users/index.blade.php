
@extends('layouts.header')
@section('isi')
@if(Auth::user()->role == 'admin')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User management</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="text-center mt-4">Edit User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
         <p>{{ $message }}</p>
      </div>
     @endif
    <!-- /.content-header -->
        <table class="table m-1">
            <thead>
                <tr>
                <th width="40">NO</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>FOTO</th>
                <th>ROLE</th>
                <th>STATUS</th>
                <th>AKSI</th>

                </tr>
            </thead>
            <tbody>
                @if (count ($user))
                    @foreach ($user as $key => $users)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->foto }}</td>
                            @if ( $users->role == 'admin' )
                            <td><span class="badge badge-success">{{ $users->role }}</span></td>
                            @elseif ($users->role == 'guru')
                            <td><span class="badge badge-info">{{ $users->role }}</span></td>
                            @else
                            <td><span class="badge badge-warning">{{ $users->role }}</span></td>
                            @endif

                            @if ( $users->isactive == 'Active' )
                              <td><span class="badge badge-success">{{ $users->isactive }}</span></td>
                            @else
                              <td><span class="badge badge-danger">{{ $users->isactive }}</span></td>
                            @endif
                            <td>
                                <form method="POST" action="{{ route('management.destroy',$users->id) }}">
                                    @csrf
                                    @method('DELETE')
                                   
                                    &nbsp;
                                    <a class="btn btn-warning btn-sm" title="Ubah User"
                                        href=" {{ route('management.edit',$users->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus User"
                                        onclick="return confirm('Anda Yakin Data akan Menghapus Siswa atas Nama {{ $users->name }}?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div>
    <!-- /.card-footer -->
  </div>
  @else
   @include('layouts.accses-denied')
  @endif
  @endsection
 
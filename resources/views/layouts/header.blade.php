<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presesnsi Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  @include('sweetalert::alert')
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown"><span class="badge badge-info"></span>
        <a class="nav-link" data-toggle="dropdown" href="#">
          @empty(Auth::user()->foto)
            <img src="{{ url('public/img/guru/nophoto.png') }}" alt="Profile" class="rounded-circle" height="30" width="30"><span class="fa fa-arrow-down"></span>
          @else
            <img src="{{ asset('public/user')}}/{{Auth::user()->foto}}" class="rounded-circle" height="30" width="30">&nbsp;<span class="fa fa-arrow-down"></span>
          @endempty 
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <a  href=" {{ route('management.show',Auth::user()->id) }}" class="dropdown-item">
            <i class="far fa-user mr-2"></i>&nbsp;My Profile
          </a>
          <div class="dropdown-divider"></div>
          @if(Auth::user()->role == 'admin')
          <a href="{{ url('/management') }}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>Management Users
          </a>
          @endif
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fa fa-arrow-left"></i>&nbsp;&nbsp; {{ __('Logout') }}                      
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      @empty(Auth::user()->foto)
         <img src="{{ url('public/img/guru/nophoto.png') }}" alt="Profile" class="brand-image img-circle elevation-3" style="opacity: .8" height="30" width="30">
      @else
         <img src="{{ asset('public/user')}}/{{Auth::user()->foto}}" class="brand-image img-circle elevation-3" style="opacity: .8" height="30" width="30">
      @endempty
      <span class="brand-text font-weight-light">  
        {{ Auth::user()->name }}
        {{--  @if (empty(Auth::user()->name))
         {{ '' }}
         @else
         {{ Auth::user()->name }}
         @endif</span>--}} 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-warning"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right text-success"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Auth::user()->role == 'guru' or Auth::user()->role == 'admin')
              <li class="nav-item">
                <a href="{{ url('/guru') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Guru</p>
                </a>
              </li> 
              @endif
              @if(Auth::user()->role == 'guru')
              <li class="nav-item">
                <a  href="{{ url('/siswa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a  href="{{ url('/kelas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Kelas</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->role == 'guru' or Auth::user()->role == 'siswa')
          <li class="nav-item">
            <a  href="{{ url('/jadwal') }}" class="nav-link">
              <i class="nav-icon fas fa-edit text-primary"></i>
              <p>Jadwal</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="{{ url('/presensi') }}" class="nav-link">
              <i class="nav-icon fas fa-table text-success"></i>
              <p> Rekap Presensi </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
        

 
    
         @yield('isi')
         

    <!--footer-->
    <footer class="main-footer">
      <strong>@ Presensi Siswa</a></strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
      
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->
  
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('public/dist/js/adminlte.js') }}"></script>
  
  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('public/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('public/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('public/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('public/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('public/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('public/dist/js/pages/dashboard2.js') }}"></script>
  </body>
  </html>
  
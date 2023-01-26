<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          ////menampilkan seluruh data 
          $siswa = DB::table('siswa')->count();
          $guru = DB::table('guru')->count();
          $kelas = DB::table('kelas')->count();
          $jadwal = DB::table('jadwal')->count();
          $presensi = DB::table('presensi')->count();
          $user = DB::table('users')->count();
          return view('admin.dashboard', compact('siswa','guru','kelas','jadwal','presensi','user'));
    }

}

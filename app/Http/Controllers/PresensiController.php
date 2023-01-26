<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Presensi;
use DB;
use PDF;
class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          ////menampilkan seluruh data 
          $presensi = DB::table('presensi')
          ->join('kelas','kelas.id', '=','presensi.kelas_id')
          ->join('siswa','siswa.id', '=','presensi.siswa_id')
          ->join('jadwal','jadwal.id', '=','presensi.jadwal_id')
          ->join('guru','guru.id', '=','jadwal.guru_id')
          ->select('presensi.*','siswa.nama','guru.nama AS pengajar','jadwal.hari','jadwal.jam_pelajaran','jadwal.nama_mapel','kelas.nama_kelas')
          ->get();
          return view('presensi.index', compact('presensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presensi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tangkap request dari form
        DB::table('presensi')->insert(
            [
                'siswa_id'=>$request->siswa_id,
                'kelas_id'=>$request->kelas_id,
                'jadwal_id'=>$request->jadwal_id,
                'status'=>$request->status,
            ]
        );
        return redirect('/presensi')
                 ->with('success','Terimakasih. presesnsi anda telah tercatat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('presensi')
               ->where ('id','=',$id)->get();
        return view('presensi.edit',compact('data'));
    }               

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table ('presensi')->where('id','=',$id)->update(
            [
                'siswa_id'=>$request->siswa_id,
                'kelas_id'=>$request->kelas_id,
                'jadwal_id'=>$request->jadwal_id,
                'status'=>$request->status,
            ]
        );
        return redirect('/presensi','/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table ('presensi')->where('id','=',$id)->delete();
        return redirect('/presensi');
    }

    public function presensiPDF()
    {
       
        $presensi = DB::table('presensi')
        ->join('kelas','kelas.id', '=','presensi.kelas_id')
        ->join('siswa','siswa.id', '=','presensi.siswa_id')
        ->join('jadwal','jadwal.id', '=','presensi.jadwal_id')
        ->join('guru','guru.id', '=','jadwal.guru_id')
        ->select('presensi.*','siswa.nama','guru.nama AS pengajar','jadwal.hari','jadwal.jam_pelajaran','jadwal.nama_mapel','kelas.nama_kelas')
        ->get();
       $pdf = PDF::loadview('presensi.myPDF',['presensi'=>$presensi]);
       return $pdf->download('presensi.pdf');
    }
}

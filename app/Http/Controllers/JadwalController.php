<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Jadwal;
use DB;
use PDF;
class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data 
        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_mapel' => 'required',
            'kelas_id' => 'required',
            'guru_id' => 'required',
            'hari' => 'required',
            'jam_pelajaran' => 'required',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')
                         ->with('success','Data Jadwal Baru Berhasil Disimpan');
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
        $row = Jadwal::find($id);
        return view('jadwal.edit',compact('row'));
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
        $request->validate([
            'nama_mapel' => 'required',
            'kelas_id' => 'required',
            'guru_id' => 'required',
            'hari' => 'required',
            'jam_pelajaran' => 'required',
        ]);

        Jadwal::find($id)->update($request->all());
        return redirect()->route('jadwal.index')
                        ->with('success','Jadwal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::where('id',$id)->delete();
        return redirect()->route('jadwal.index')
                         ->with('success','Jadwal Berhasil Dihapus');
    }
    //extension pdf
    public function jadwalPDF()
    {
       
       $jadwals = DB::table('jadwal')
       ->join('kelas','kelas.id', '=','jadwal.kelas_id')
       ->join('guru','guru.id', '=','jadwal.guru_id')
       ->select('jadwal.*','guru.nama','kelas.nama_kelas')
       ->get();
       $pdf = PDF::loadview('jadwal.myPDF',['jadwals'=>$jadwals]);
       return $pdf->download('jadwal.pdf');
    }
}

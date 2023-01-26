<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Siswa;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
Use Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          ////menampilkan seluruh data 
          $siswa = Siswa::all();
          return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ar_gender = ['laki-laki','perempuan'];
        return view('siswa.form',compact('ar_gender')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email',
            'nama_ortu' => 'required',
            'alamat' => 'nullable|string|min:10',
            'phone_number' => 'required',
        ],
    
    [
        'nis.required' =>'nis wajib diisi ',
        'nis.unique' =>'nis tidak boleh sama ',
        'nama.required' =>'nama wajib di isi',
        'gender.required' =>'gender wajib di isi',
        'tempat_lahir.required' =>'tempat_lahir wajib di isi',
        'tgl_lahir.required' =>'tgl_lahir wajib di isi',
        'email.required' =>'email wajib di isi',
        'phone_number.required' =>'nomor telephone wajib di isi',
        'email.email' =>'menggunakan @...',
        'alamat.required' =>'alamat wajib di isi',
        'nama_ortu.required' =>'nama orang tua wajib di isi',
    ]);
        Siswa::create($request->all());
        return redirect()->route('siswa.index')
                        ->with('success','Data Siswa Baru Berhasil Ditambah');
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
        $row = Siswa::find($id);
        return view('siswa.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $row = Siswa::find($id);
        return view('siswa.form_edit',compact('row'));
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
        //
        $request->validate([
            //'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email',
            'nama_ortu' => 'required',
            'alamat' => 'nullable|string|min:10',
            'phone_number' => 'required',
        ],
        [
            'nis.required' =>'nis wajib diisi ',
            'nis.unique' =>'nis tidak boleh sama ',
            'nama.required' =>'nama wajib di isi',
            'gender.required' =>'gender wajib di isi',
            'tempat_lahir.required' =>'tempat_lahir wajib di isi',
            'tgl_lahir.required' =>'tgl_lahir wajib di isi',
            'email.required' =>'email wajib di isi',
            'phone_number.required' =>'nomor telephone wajib di isi',
            'email.email' =>'menggunakan @...',
            'alamat.required' =>'alamat wajib di isi',
            'nama_ortu.required' =>'nama orang tua wajib di isi',
        ]);
        Siswa::find($id)->update($request->all());
        return redirect()->route('siswa.index')
                        ->with('success','Data Siswa Baru Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Siswa::where('id',$id)->delete();
        return redirect()->route('siswa.index')
                        ->with('success','Data Siswa Berhasil Dihapus');
    }
    public function SiswaExcel() 
    {
        return Excel::download(new SiswaExport, 'data_siswa.xlsx');
    }

    public function apiSiswa()
    {
        //menampilkan seluruh data
        //$pegawai = Pegawai::all();
        $siswa = Siswa::all();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Siswa',
                'data'=>$siswa,
            ],200);
    }

    public function apiDetailSiswa($id)
    {
        
        $siswa = Siswa::find($id);
        if($siswa){ //jika data pegawai ditemukan
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail siswa',
                    'data'=>$siswa,
                ],200);
        }
        else{ //jika data pegawai tidak ditemukan
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Siswa Tidak ditemukan',
                ],404);
        }
    }
}

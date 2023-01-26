<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use DB;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $row = Users::find($id);
        return view('users.editprofil',compact('row'));
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
            'name' => 'required|max:45',   
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'       
        ]);
        $foto = DB::table('users')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('user/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->name.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('user/'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('users')->where('id',$id)->update(
            [               
                'name' => $request->name,
                'foto' => $fileName,
            ]);
            return redirect()->route('management.show',Auth::user()->id)
            ->with('success','Data User Berhasil Diubah');
    }

    /**{{ route('management.show',Auth::user()->id) }}
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

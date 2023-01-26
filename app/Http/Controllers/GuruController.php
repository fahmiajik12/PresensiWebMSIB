<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Guru;
use Alert;
use DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data guru
       // $guru = Guru::all();
         $guru = Guru::orderBy('id','DESC')->get();
        return view('guru.index', compact('guru'));

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
        return view('guru.form',compact('ar_gender'));
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
            'nip' => 'required|unique:guru|max:9',
            'nama' => 'required|max:45',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'alamat' => 'string|min:10',
            'pendidikan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'           
        ],
        [
            'nip.required' =>'nip wajib di isi',
            'nama.required' =>'nama wajib di isi',
            'tempat_lahir.required' =>'tempat_lahir wajib di isi',
            'tgl_lahir.required' =>'tgl_lahir wajib di isi',
            'gender.required' =>'gender wajib di isi',
            'phone_number.required' =>'phone_number wajib di isi',
            'email.required' =>'email wajib di isi',
            'email.email' =>'menggunakan @gmail',
            'alamat.required' =>'alamat wajib di isi',
            'pendidikan.required' =>'pendidikan wajib di isi',
        ]);
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->nip.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img/guru'),$fileName);
        }
        else{
            $fileName = '';
        }
        DB::table('guru')->insert(
            [                
                'nip' => $request->nip,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'pendidikan' => $request->pendidikan,
                'foto' => $fileName,
            ]);
        // Guru::create($request->all());
       
        return redirect()->route('guru.index')
                        ->with('success','Guru Berhasil Ditambahkan');
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
        $row = Guru::find($id);
        return view('guru.show',compact('row'));
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
        $row = Guru::find($id);
        return view('guru.form_edit',compact('row'));
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
            'nip' => 'required',            
            'nama' => 'required|max:45',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'alamat' => 'string|min:10',
            'pendidikan' => 'required',    
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'       
        ]);
        $foto = DB::table('guru')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('public/img/guru/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->nip.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img/guru'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('guru')->where('id',$id)->update(
            [
                'nip' => $request->nip,                
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'pendidikan' => $request->pendidikan,
                'foto' => $fileName,
            ]);
        // Guru::find($id)->update($request->all());
       
        return redirect()->route('guru.index')
                         ->with('success','Data Guru Berhasil Diubah');
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
        $row = Guru::find($id);
        if(!empty($row->foto)) unlink('public/img/guru/'.$row->foto);
        Guru::where('id',$id)->delete();
        return redirect()->route('guru.index')
                        ->with('success','Data Guru Berhasil Dihapus');
    }
    public function delete($id)
    {
        //
        $row = Guru::find($id);
        if(!empty($row->foto)) unlink('public/img/guru/'.$row->foto);
        Guru::where('id',$id)->delete();
        return back();
    }

}

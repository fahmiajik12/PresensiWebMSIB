<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Http\Resources\GuruResource;
use DB;
use Illuminate\Support\Facades\Validator;
class GuruController extends Controller
{
    public function index()
    {
        //menampilkan seluruh data guru
        $guru = Guru::all();
        return new GuruResource (true,'Data Guru',$guru);

    }

    public function show($id)
    {
        
        $guru = Guru::find($id);
        
            return new GuruResource (true,'Detail Data Guru',$guru);
               
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'nip' => 'required|unique:guru|max:9',
            'nama' => 'required|max:45',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'alamat' => 'string|min:10',
            'pendidikan' => 'required',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),442);
        }
       
        $guru = Guru::create(
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
                //'foto' => $fileName,
            ]);
        // Guru::create($request->all());
        return new GuruResource (true,'Data Guru Berhasil Diinput',$guru);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nip' => 'required|max:9',
            'nama' => 'required|max:45',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'alamat' => 'string|min:10',
            'pendidikan' => 'required',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),442);
        }
        $guru = Guru::whereId($id)->update(
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
                //'foto' => $fileName,
            ]);
            return new GuruResource (true,'Data Guru Berhasil Diubah',$guru);

    }
    public function destroy($id)
    {
        $guru = Guru::whereId($id)->first();
        $guru->delete();

        return new GuruResource(true, 'Data Guru Berhasil dihapus',$guru);              
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    //mapping ke kolom/field
    protected $fillable = ['siswa_id','kelas_id','jadwal_id','status'];

   
    
   
}

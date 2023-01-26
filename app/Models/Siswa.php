<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    //mapping ke kolom/field
    protected $fillable = ['nis','nama','gender','tempat_lahir','tgl_lahir','email','nama_ortu','alamat','phone_number'];
    
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}

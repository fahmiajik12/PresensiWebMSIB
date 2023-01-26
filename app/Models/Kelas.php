<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    //mapping ke kolom/field
    protected $fillable = ['kode_kelas','nama_kelas'];
    
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}

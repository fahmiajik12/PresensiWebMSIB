<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    //mapping ke kolom/field
    protected $fillable = ['nama_mapel','kelas_id','guru_id','hari','jam_pelajaran'];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}

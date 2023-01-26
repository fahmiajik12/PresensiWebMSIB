<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    //mapping ke kolom/field
    protected $fillable = ['nip','nama','alamat','email','tempat_lahir','tgl_lahir','gender','phone_number','email','alamat','pendidikan','foto'];
   
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class); 
    }
}

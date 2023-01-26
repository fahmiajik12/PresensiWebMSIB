<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    //mapping ke kolom/field
    protected $fillable = ['name','email','password','role','isactive','foto'];
}

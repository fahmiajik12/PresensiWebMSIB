<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $siswa = DB::table('siswa')
        ->select('nis','nama','gender','tempat_lahir','tgl_lahir','email','nama_ortu','alamat',
        'phone_number')->get();
        return $siswa;
    }

    public function headings(): array
    {
        return["Nis","Nama","Gender","Tempat Lahir","Tanggal lahir","Email",
        "Nama Orangtua","Alamat","Phone Number"];
    }
}

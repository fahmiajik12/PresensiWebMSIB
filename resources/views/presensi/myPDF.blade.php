<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
    <body>
        <h3 align="center">DAFTAR PRESENSI</h3>
            <table border="1" cellpadding="10" align="center">
                <thead>
                    <tr>
                        <th width="40">NO</th>
                        <th>HARI</th>
                        <th>NAMA SISWA</th>
                        <th>KELAS</th>
                        <th>MATA PELAJARAN</th>
                        <th>NAMA PENGAJAR</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($presensi))
                        @foreach ($presensi as $key => $absensi)
                            <tr>
                                <td align="center">{{ $key+1 }}</td>
                                <td>{{ $absensi->hari }}, {{ ($absensi->jam_pelajaran) }}</td>     
                                <td>{{ $absensi->nama }}</td> 
                                <td>{{ $absensi->nama_kelas }}</td>  
                                <td>{{ $absensi->nama_mapel }}</td>
                                <td>{{ $absensi->pengajar }}</td>
                                <td>{{ $absensi->status }}</td>
                            </tr>
                        @endforeach
                    @endif
              </tbody>
            </table>
          </div>       
    </body>

</html>
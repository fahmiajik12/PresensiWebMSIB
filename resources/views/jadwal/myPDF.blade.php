<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal</title>
    <body>
        <h3 align="center">Jadwal Pelajaran</h3>
            <table border="1" cellpadding="10" align="center">
                <thead>
                    <tr>
                    <th>NO</th>
                    <th>MATA PELAJARAN</th>
                    <th>KELAS</th>
                    <th>PENGAJAR</th>
                    <th>HARI</th>
                    <th>JAM</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($jadwals))
                        @foreach ($jadwals as $key => $jadwal)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $jadwal->nama_mapel }}</td>
                                <td>{{ $jadwal->nama_kelas }}</td>
                                <td>{{ $jadwal->nama }}</td>
                                <td>{{ $jadwal->hari }}</td>
                                <td>{{ $jadwal->jam_pelajaran }}</td>
                            </tr>
                        @endforeach
                    @endif
              </tbody>
            </table>
          </div>       
    </body>

</html>
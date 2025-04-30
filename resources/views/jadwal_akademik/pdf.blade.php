<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal Akademik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Jadwal Akademik</h1>
    
    <table>
        <thead>
            <tr>
                <th>Hari</th>
                <th>Mata Kuliah</th>
                <th>Ruang</th>
                <th>Golongan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal_akademik as $jadwal)
            <tr>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->matakuliah->Kode_mk }} - {{ $jadwal->matakuliah->Nama_mk }}</td>
                <td>{{ $jadwal->ruang->nama_ruang }}</td>
                <td>{{ $jadwal->golongan->nama_Gol }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
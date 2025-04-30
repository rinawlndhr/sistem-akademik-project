<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengampu</title>
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
    <h1>Daftar Pengampu</h1>
    
    <table>
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengampu as $pengampu)
            <tr>
                <td>{{ $pengampu->dosen->NIP }}</td>
                <td>{{ $pengampu->dosen->Nama }}</td>
                <td>{{ $pengampu->matakuliah->Kode_mk }}</td>
                <td>{{ $pengampu->matakuliah->Nama_mk }}</td>
                <td>{{ $pengampu->matakuliah->sks }}</td>
                <td>{{ $pengampu->matakuliah->semester }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
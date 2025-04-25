<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
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
    <h1>Daftar Mahasiswa</h1>
    
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Golongan</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->NIM }}</td>
                <td>{{ $mahasiswa->Nama }}</td>
                <td>{{ $mahasiswa->Semester }}</td>
                <td>{{ $mahasiswa->golongan->nama_Gol }}</td>
                <td>{{ $mahasiswa->Nohp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
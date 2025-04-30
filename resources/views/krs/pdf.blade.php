<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar KRS</title>
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
    <h1>Daftar Kartu Rencana Studi (KRS)</h1>
    
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($krs as $item)
            <tr>
                <td>{{ $item->mahasiswa->NIM }}</td>
                <td>{{ $item->mahasiswa->Nama }}</td>
                <td>{{ $item->matakuliah->Kode_mk }}</td>
                <td>{{ $item->matakuliah->Nama_mk }}</td>
                <td>{{ $item->matakuliah->sks }}</td>
                <td>{{ $item->matakuliah->semester }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
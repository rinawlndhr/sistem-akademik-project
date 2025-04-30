<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
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
    <h1>Daftar Mata Kuliah</h1>
    
    <table>
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matakuliah as $matakuliah)
            <tr>
                <td>{{ $matakuliah->Kode_mk }}</td>
                <td>{{ $matakuliah->Nama_mk }}</td>
                <td>{{ $matakuliah->sks }}</td>
                <td>{{ $matakuliah->semester }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
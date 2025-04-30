<!DOCTYPE html>
<html>
<head>
    <title>Presensi Akademik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-height: 80px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .status-hadir {
            background-color: #d4edda;
        }
        .status-izin {
            background-color: #d1ecf1;
        }
        .status-sakit {
            background-color: #fff3cd;
        }
        .status-alfa {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PRESENSI AKADEMIK</h2>
        <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presensi_akademik as $key => $presensi)
            <tr class="@if($presensi->status_kehadiran == 'Hadir') status-hadir @elseif($presensi->status_kehadiran == 'Izin') status-izin @elseif($presensi->status_kehadiran == 'Sakit') status-sakit @else status-alfa @endif">
                <td>{{ $key + 1 }}</td>
                <td>{{ $presensi->NIM }}</td>
                <td>{{ $presensi->mahasiswa->Nama ?? 'N/A' }}</td>
                <td>{{ $presensi->Kode_mk }}</td>
                <td>{{ $presensi->matakuliah->Nama_mk ?? 'N/A' }}</td>
                <td>{{ date('d-m-Y', strtotime($presensi->tanggal)) }}</td>
                <td>{{ $presensi->jam_masuk }}</td>
                <td>{{ $presensi->jam_keluar }}</td>
                <td>{{ $presensi->status_kehadiran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>........................, {{ date('d-m-Y') }}</p>
        <p>Mengetahui,</p>
        <br><br><br>
        <p>(_________________________)</p>
    </div>
</body>
</html>
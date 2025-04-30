@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Jadwal Akademik</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">Hari</th>
                            <td>{{ $jadwal_akademik->hari }}</td>
                        </tr>
                        <tr>
                            <th>Mata Kuliah</th>
                            <td>{{ $jadwal_akademik->matakuliah->Kode_mk }} - {{ $jadwal_akademik->matakuliah->Nama_mk }}</td>
                        </tr>
                        <tr>
                            <th>Ruang</th>
                            <td>{{ $jadwal_akademik->ruang->nama_ruang }}</td>
                        </tr>
                        <tr>
                            <th>Golongan</th>
                            <td>{{ $jadwal_akademik->golongan->nama_Gol }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('jadwal_akademik.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('jadwal_akademik.edit', $jadwal_akademik->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
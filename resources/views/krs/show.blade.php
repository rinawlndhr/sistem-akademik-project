@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail KRS</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $krs->id }}</td>
                        </tr>
                        <tr>
                            <th>Mahasiswa</th>
                            <td>{{ $krs->mahasiswa->NIM ?? '-' }} - {{ $krs->mahasiswa->Nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Mata Kuliah</th>
                            <td>{{ $krs->matakuliah->Kode_mk ?? '-' }} - {{ $krs->matakuliah->Nama_mk ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>SKS</th>
                            <td>{{ $krs->matakuliah->sks ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ $krs->matakuliah->Semester ?? '-' }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

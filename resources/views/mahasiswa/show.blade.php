@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">NIM</th>
                            <td>{{ $mahasiswa->NIM }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $mahasiswa->Nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $mahasiswa->Alamat }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $mahasiswa->Nohp }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ $mahasiswa->Semester }}</td>
                        </tr>
                        <tr>
                            <th>Golongan</th>
                            <td>{{ $mahasiswa->golongan->nama_Gol }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->NIM) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
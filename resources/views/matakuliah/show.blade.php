@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Mata Kuliah</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">Kode Mata Kuliah</th>
                            <td>{{ $matakuliah->Kode_mk }}</td>
                        </tr>
                        <tr>
                            <th>Nama Mata Kuliah</th>
                            <td>{{ $matakuliah->Nama_mk }}</td>
                        </tr>
                        <tr>
                            <th>SKS</th>
                            <td>{{ $matakuliah->sks }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ $matakuliah->semester }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('matakuliah.edit', $matakuliah->Kode_mk) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
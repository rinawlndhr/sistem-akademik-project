@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Pengampu</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $pengampu->id }}</td>
                        </tr>
                        <tr>
                            <th>Dosen</th>
                            <td>{{ $pengampu->dosen->NIP }} - {{ $pengampu->dosen->Nama }}</td>
                        </tr>
                        <tr>
                            <th>Mata Kuliah</th>
                            <td>{{ $pengampu->matakuliah->Kode_mk }} - {{ $pengampu->matakuliah->Nama_mk }}</td>
                        </tr>
                        <tr>
                            <th>SKS</th>
                            <td>{{ $pengampu->matakuliah->sks }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ $pengampu->matakuliah->semester }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('pengampu.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('pengampu.edit', $pengampu->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
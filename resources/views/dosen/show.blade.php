@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Dosen</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">NIP</th>
                            <td>{{ $dosen->NIP }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $dosen->Nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $dosen->Alamat }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $dosen->Nohp }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('dosen.edit', $dosen->NIP) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
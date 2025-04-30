@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Golongan</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">ID Golongan</th>
                            <td>{{ $golongan->id_Gol }}</td>
                        </tr>
                        <tr>
                            <th>Nama Golongan</th>
                            <td>{{ $golongan->nama_Gol }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('golongan.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('golongan.edit', $golongan->id_Gol) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
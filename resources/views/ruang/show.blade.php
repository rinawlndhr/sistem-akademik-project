@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Ruang</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">ID Ruang</th>
                            <td>{{ $ruang->id_ruang }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ruang</th>
                            <td>{{ $ruang->nama_ruang }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('ruang.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('ruang.edit', $ruang->id_ruang) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
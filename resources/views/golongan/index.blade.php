@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Golongan</h4>
                        <div>
                            <a href="{{ route('golongan.create') }}" class="btn btn-success">Tambah Golongan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Golongan</th>
                                <th>Nama Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($golongan as $golongan)
                            <tr>
                                <td>{{ $golongan->id_Gol }}</td>
                                <td>{{ $golongan->nama_Gol }}</td>
                                <td>
                                    <form action="{{ route('golongan.destroy', $golongan->id_Gol) }}" method="POST">
                                        <a href="{{ route('golongan.show', $golongan->id_Gol) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('golongan.edit', $golongan->id_Gol) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data golongan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

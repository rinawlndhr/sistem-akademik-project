@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Ruang</h4>
                        <div>
                            <a href="{{ route('ruang.create') }}" class="btn btn-success">Tambah Ruang</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Ruang</th>
                                <th>Nama Ruang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ruang as $ruang)
                            <tr>
                                <td>{{ $ruang->id_ruang }}</td>
                                <td>{{ $ruang->nama_ruang }}</td>
                                <td>
                                    <form action="{{ route('ruang.destroy', $ruang->id_ruang) }}" method="POST">
                                        <a href="{{ route('ruang.show', $ruang->id_ruang) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('ruang.edit', $ruang->id_ruang) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data ruang</td>
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
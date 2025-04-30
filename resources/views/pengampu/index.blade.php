@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Pengampu</h4>
                        <div>
                            <a href="{{ route('pengampu.pdf') }}" class="btn btn-primary">Download PDF</a>
                            <a href="{{ route('pengampu.create') }}" class="btn btn-success">Tambah Pengampu</a>
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
                                <th>No</th>
                                <th>Dosen</th>
                                <th>Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengampu as $pengampu)
                            <tr>
                                <td>{{ $pengampu->id }}</td>
                                <td>{{ $pengampu->dosen->Nama }}</td>
                                <td>{{ $pengampu->matakuliah->Nama_mk }}</td>
                                <td>
                                    <form action="{{ route('pengampu.destroy', $pengampu->id) }}" method="POST">
                                        <a href="{{ route('pengampu.show', $pengampu->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('pengampu.edit', $pengampu->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data pengampu</td>
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
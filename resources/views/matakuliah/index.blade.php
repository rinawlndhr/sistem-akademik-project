@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Mata Kuliah</h4>
                        <div>
                            <a href="{{ route('matakuliah.pdf') }}" class="btn btn-primary">Download PDF</a>
                            <a href="{{ route('matakuliah.create') }}" class="btn btn-success">Tambah Mata Kuliah</a>
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
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($matakuliah as $matakuliah)
                            <tr>
                                <td>{{ $matakuliah->Kode_mk }}</td>
                                <td>{{ $matakuliah->Nama_mk }}</td>
                                <td>{{ $matakuliah->sks }}</td>
                                <td>{{ $matakuliah->semester }}</td>
                                <td>
                                    <form action="{{ route('matakuliah.destroy', $matakuliah->Kode_mk) }}" method="POST">
                                        <a href="{{ route('matakuliah.show', $matakuliah->Kode_mk) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('matakuliah.edit', $matakuliah->Kode_mk) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data mata kuliah</td>
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
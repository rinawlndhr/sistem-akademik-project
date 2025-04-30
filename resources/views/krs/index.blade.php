@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data KRS</h4>
                        <div>
                            <a href="{{ route('krs.pdf') }}" class="btn btn-primary">Download PDF</a>
                            <a href="{{ route('krs.create') }}" class="btn btn-success">Tambah KRS</a>
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
                                <th>Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($krs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->mahasiswa->NIM }} - {{ $item->mahasiswa->Nama }}</td>
                                <td>{{ $item->matakuliah->Kode_mk }} - {{ $item->matakuliah->Nama_mk }}</td>
                                <td>
                                    <form action="{{ route('krs.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('krs.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data KRS</td>
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
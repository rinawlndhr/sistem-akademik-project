@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Mahasiswa</h4>
                        <div>
                            <a href="{{ route('mahasiswa.pdf') }}" class="btn btn-primary">Download PDF</a>
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">Tambah Mahasiswa</a>
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
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Semester</th>
                                <th>Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->NIM }}</td>
                                <td>{{ $mahasiswa->Nama }}</td>
                                <td>{{ $mahasiswa->Semester }}</td>
                                <td>{{ $mahasiswa->golongan->nama_Gol }}</td>
                                <td>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->NIM) }}" method="POST">
                                        <a href="{{ route('mahasiswa.show', $mahasiswa->NIM) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->NIM) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data mahasiswa</td>
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
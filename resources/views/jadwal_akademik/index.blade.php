@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Jadwal Akademik</h4>
                        <div>
                            <a href="{{ route('jadwal_akademik.pdf') }}" class="btn btn-primary">Download PDF</a>
                            <a href="{{ route('jadwal_akademik.create') }}" class="btn btn-success">Tambah Jadwal</a>
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
                                <th>Hari</th>
                                <th>Mata Kuliah</th>
                                <th>Ruang</th>
                                <th>Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwal_akademik as $jadwal)
                            <tr>
                                <td>{{ $jadwal->hari }}</td>
                                <td>{{ $jadwal->matakuliah->Nama_mk }}</td>
                                <td>{{ $jadwal->ruang->nama_ruang }}</td>
                                <td>{{ $jadwal->golongan->nama_Gol }}</td>
                                <td>
                                    <form action="{{ route('jadwal_akademik.destroy', $jadwal->id) }}" method="POST">
                                        <a href="{{ route('jadwal_akademik.show', $jadwal->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('jadwal_akademik.edit', $jadwal->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data jadwal akademik</td>
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
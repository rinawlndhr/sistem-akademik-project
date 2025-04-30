@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Data Dosen</h4>
                        <div>
                            <a href="{{ route('dosen.pdf') }}" class="btn btn-primary">Download PDF</a>
                            <a href="{{ route('dosen.create') }}" class="btn btn-success">Tambah Dosen</a>
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dosen as $dosen)
                            <tr>
                                <td>{{ $dosen->NIP }}</td>
                                <td>{{ $dosen->Nama }}</td>
                                <td>{{ $dosen->Nohp }}</td>
                                <td>{{ $dosen->Alamat }}</td>
                                <td>
                                    <form action="{{ route('dosen.destroy', $dosen->NIP) }}" method="POST">
                                        <a href="{{ route('dosen.show', $dosen->NIP) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('dosen.edit', $dosen->NIP) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data dosen</td>
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
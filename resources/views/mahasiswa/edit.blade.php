@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Mahasiswa</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('mahasiswa.update', $mahasiswa->NIM) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="NIM" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="NIM" name="NIM" value="{{ $mahasiswa->NIM }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" value="{{ $mahasiswa->Nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="Alamat" name="Alamat" rows="3">{{ $mahasiswa->Alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Nohp" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="Nohp" name="Nohp" value="{{ $mahasiswa->Nohp }}">
                        </div>
                        <div class="mb-3">
                            <label for="Semester" class="form-label">Semester</label>
                            <input type="text" class="form-control" id="Semester" name="Semester" value="{{ $mahasiswa->Semester }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_Gol" class="form-label">Golongan</label>
                            <select class="form-control" id="id_Gol" name="id_Gol" required>
                                @foreach ($golongans as $golongan)
                                    <option value="{{ $golongan->id_Gol }}" {{ $mahasiswa->id_Gol == $golongan->id_Gol ? 'selected' : '' }}>
                                        {{ $golongan->nama_Gol }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
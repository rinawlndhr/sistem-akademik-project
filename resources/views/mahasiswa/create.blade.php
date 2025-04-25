@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Mahasiswa</h4>
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
                    
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="NIM" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="NIM" name="NIM" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="Alamat" name="Alamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Nohp" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="Nohp" name="Nohp">
                        </div>
                        <div class="mb-3">
                            <label for="Semester" class="form-label">Semester</label>
                            <input type="text" class="form-control" id="Semester" name="Semester" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_Gol" class="form-label">Golongan</label>
                            <select class="form-control" id="id_Gol" name="id_Gol" required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongans as $golongan)
                                    <option value="{{ $golongan->id_Gol }}">{{ $golongan->nama_Gol }}</option>
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
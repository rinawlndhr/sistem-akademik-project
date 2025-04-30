@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit KRS</h4>
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
                    
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('krs.update', $krs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="NIM" class="form-label">Mahasiswa</label>
                            <select class="form-control" id="NIM" name="NIM" required>
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach ($mahasiswa as $mahasiswa)
                                    <option value="{{ $mahasiswa->NIM }}" {{ $krs->NIM == $mahasiswa->NIM ? 'selected' : '' }}>
                                        {{ $mahasiswa->NIM }} - {{ $mahasiswa->Nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Kode_mk" class="form-label">Mata Kuliah</label>
                            <select class="form-control" id="Kode_mk" name="Kode_mk" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($matakuliah as $matakuliah)
                                    <option value="{{ $matakuliah->Kode_mk }}" {{ $krs->Kode_mk == $matakuliah->Kode_mk ? 'selected' : '' }}>
                                        {{ $matakuliah->Nama_mk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
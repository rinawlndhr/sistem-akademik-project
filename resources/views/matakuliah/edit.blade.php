@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Mata Kuliah</h4>
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
                    
                    <form action="{{ route('matakuliah.update', $matakuliah->Kode_mk) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="Kode_mk" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="Kode_mk" name="Kode_mk" value="{{ $matakuliah->Kode_mk }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="Nama_mk" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="Nama_mk" name="Nama_mk" value="{{ $matakuliah->Nama_mk }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control" id="sks" name="sks" value="{{ $matakuliah->sks }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="text" class="form-control" id="semester" name="semester" value="{{ $matakuliah->semester }}" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
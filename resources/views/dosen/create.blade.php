@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Dosen</h4>
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
                    
                    <form action="{{ route('dosen.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="NIP" name="NIP" required>
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
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
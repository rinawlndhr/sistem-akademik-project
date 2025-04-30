@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Golongan</h4>
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
                    
                    <form action="{{ route('golongan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_Gol" class="form-label">ID Golongan</label>
                            <input type="text" class="form-control" id="id_Gol" name="id_Gol" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_Gol" class="form-label">Nama Golongan</label>
                            <input type="text" class="form-control" id="nama_Gol" name="nama_Gol" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('golongan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
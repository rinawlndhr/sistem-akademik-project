@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Dashboard Sistem Akademik</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Mahasiswa</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ \App\Models\Mahasiswa::count() }}</h5>
                                    <p class="card-text">Total Mahasiswa</p>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-light btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Dosen</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ \App\Models\Dosen::count() }}</h5>
                                    <p class="card-text">Total Dosen</p>
                                    <a href="{{ route('dosen.index') }}" class="btn btn-light btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">Mata Kuliah</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ \App\Models\Matakuliah::count() }}</h5>
                                    <p class="card-text">Total Mata Kuliah</p>
                                    <a href="{{ route('matakuliah.index') }}" class="btn btn-light btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
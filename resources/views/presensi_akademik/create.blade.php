@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Presensi Akademik</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('presensi_akademik.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="NIM">Mahasiswa:</label>
                                    <select class="form-control" name="NIM" required>
                                        <option value="">-- Pilih Mahasiswa --</option>
                                        @foreach($mahasiswa as $mhs)
                                            <option value="{{ $mhs->NIM }}">{{ $mhs->Nama }} ({{ $mhs->NIM }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Kode_mk">Mata Kuliah:</label>
                                    <select class="form-control" name="Kode_mk" required>
                                        <option value="">-- Pilih Mata Kuliah --</option>
                                        @foreach($matakuliah as $mk)
                                            <option value="{{ $mk->Kode_mk }}">{{ $mk->Nama_mk }} ({{ $mk->Kode_mk }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_kehadiran">Status Kehadiran:</label>
                                    <select class="form-control" name="status_kehadiran" required>
                                        <option value="">-- Pilih Status --</option>
                                        @foreach($status_kehadiran as $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="{{ route('presensi_akademik.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
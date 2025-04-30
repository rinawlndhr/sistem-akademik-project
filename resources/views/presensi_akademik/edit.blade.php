@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Presensi Akademik</h3>
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

                    <form action="{{ route('presensi_akademik.update', $presensi_akademik->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="NIM">Mahasiswa:</label>
                                    <select class="form-control" name="NIM" required>
                                        <option value="">-- Pilih Mahasiswa --</option>
                                        @foreach($mahasiswa as $mhs)
                                            <option value="{{ $mhs->NIM }}" {{ $presensi_akademik->NIM == $mhs->NIM ? 'selected' : '' }}>
                                                {{ $mhs->Nama }} ({{ $mhs->NIM }})
                                            </option>
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
                                            <option value="{{ $mk->Kode_mk }}" {{ $presensi_akademik->Kode_mk == $mk->Kode_mk ? 'selected' : '' }}>
                                                {{ $mk->Nama_mk }} ({{ $mk->Kode_mk }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $presensi_akademik->tanggal }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_kehadiran">Status Kehadiran:</label>
                                    <select class="form-control" name="status_kehadiran" required>
                                        <option value="">-- Pilih Status --</option>
                                        @foreach($status_kehadiran as $status)
                                            <option value="{{ $status }}" {{ $presensi_akademik->status_kehadiran == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_masuk">Jam Masuk (otomatis):</label>
                                    <input type="text" class="form-control" value="{{ $presensi_akademik->jam_masuk }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_keluar">Jam Keluar (otomatis):</label>
                                    <input type="text" class="form-control" value="{{ $presensi_akademik->jam_keluar }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-secondary" href="{{ route('presensi_akademik.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
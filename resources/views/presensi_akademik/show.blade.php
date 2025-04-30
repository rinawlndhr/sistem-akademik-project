@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Detail Presensi Akademik</h3>
                        <a class="btn btn-secondary" href="{{ route('presensi_akademik.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>NIM:</strong>
                                {{ $presensi_akademik->NIM }}
                            </div>
                            <div class="form-group">
                                <strong>Nama Mahasiswa:</strong>
                                {{ $presensi_akademik->mahasiswa->Nama ?? 'N/A' }}
                            </div>
                            <div class="form-group">
                                <strong>Kode Mata Kuliah:</strong>
                                {{ $presensi_akademik->Kode_mk }}
                            </div>
                            <div class="form-group">
                                <strong>Nama Mata Kuliah:</strong>
                                {{ $presensi_akademik->matakuliah->Nama_mk ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <strong>Tanggal:</strong>
                                {{ date('d-m-Y', strtotime($presensi_akademik->tanggal)) }}
                            </div>
                            <div class="form-group">
                                <strong>Jam Masuk:</strong>
                                {{ $presensi_akademik->jam_masuk }}
                            </div>
                            <div class="form-group">
                                <strong>Jam Keluar:</strong>
                                {{ $presensi_akademik->jam_keluar }}
                            </div>
                            <div class="form-group">
                                <strong>Status Kehadiran:</strong>
                                @if($presensi_akademik->status_kehadiran == 'Hadir')
                                    <span class="badge bg-success text-white">{{ $presensi_akademik->status_kehadiran }}</span>
                                @elseif($presensi_akademik->status_kehadiran == 'Izin')
                                    <span class="badge bg-info text-white">{{ $presensi_akademik->status_kehadiran }}</span>
                                @elseif($presensi_akademik->status_kehadiran == 'Sakit')
                                    <span class="badge bg-warning text-dark">{{ $presensi_akademik->status_kehadiran }}</span>
                                @else
                                    <span class="badge bg-danger text-white">{{ $presensi_akademik->status_kehadiran }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-primary" href="{{ route('presensi_akademik.edit', $presensi_akademik->id) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
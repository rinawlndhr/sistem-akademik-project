@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Daftar Presensi Akademik</h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('presensi_akademik.create') }}">Tambah Presensi</a>
            <a class="btn btn-primary" href="{{ route('presensi_akademik.generatePDF') }}">Export PDF</a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h5>Pencarian Presensi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('presensi_akademik.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_nim">NIM / Nama</label>
                                    <input type="text" name="search_nim" class="form-control" value="{{ request('search_nim') }}" placeholder="Cari NIM/Nama">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_matkul">Mata Kuliah</label>
                                    <input type="text" name="search_matkul" class="form-control" value="{{ request('search_matkul') }}" placeholder="Cari Mata Kuliah">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search_tanggal">Tanggal</label>
                                    <input type="date" name="search_tanggal" class="form-control" value="{{ request('search_tanggal') }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search_status">Status</label>
                                    <select name="search_status" class="form-control">
                                        <option value="">Semua Status</option>
                                        <option value="Hadir" {{ request('search_status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Izin" {{ request('search_status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="Sakit" {{ request('search_status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                        <option value="Alfa" {{ request('search_status') == 'Alfa' ? 'selected' : '' }}>Alfa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="{{ route('presensi_akademik.index') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Status</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensi_akademik as $key => $presensi)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $presensi->NIM }}</td>
                            <td>{{ $presensi->mahasiswa->Nama ?? 'N/A' }}</td>
                            <td>{{ $presensi->Kode_mk }}</td>
                            <td>{{ $presensi->matakuliah->Nama_mk ?? 'N/A' }}</td>
                            <td>{{ date('d-m-Y', strtotime($presensi->tanggal)) }}</td>
                            <td>{{ $presensi->jam_masuk }}</td>
                            <td>{{ $presensi->jam_keluar }}</td>
                            <td>
                                @if($presensi->status_kehadiran == 'Hadir')
                                    <span class="badge bg-success text-white">{{ $presensi->status_kehadiran }}</span>
                                @elseif($presensi->status_kehadiran == 'Izin')
                                    <span class="badge bg-info text-white">{{ $presensi->status_kehadiran }}</span>
                                @elseif($presensi->status_kehadiran == 'Sakit')
                                    <span class="badge bg-warning text-dark">{{ $presensi->status_kehadiran }}</span>
                                @else
                                    <span class="badge bg-danger text-white">{{ $presensi->status_kehadiran }}</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('presensi_akademik.destroy', $presensi->id) }}" method="POST">
                                    <a class="btn btn-sm btn-info" href="{{ route('presensi_akademik.show', $presensi->id) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('presensi_akademik.edit', $presensi->id) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this presensi?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
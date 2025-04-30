@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Jadwal Akademik</h4>
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
                    
                    <form action="{{ route('jadwal_akademik.update', $jadwal_akademik->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select class="form-control" id="hari" name="hari" required>
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" {{ $jadwal_akademik->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $jadwal_akademik->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $jadwal_akademik->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $jadwal_akademik->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $jadwal_akademik->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ $jadwal_akademik->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Kode_mk" class="form-label">Mata Kuliah</label>
                            <select class="form-control" id="Kode_mk" name="Kode_mk" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($matakuliah as $matakuliah)
                                    <option value="{{ $matakuliah->Kode_mk }}" {{ $jadwal_akademik->Kode_mk == $matakuliah->Kode_mk ? 'selected' : '' }}>
                                        {{ $matakuliah->Nama_mk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_ruang" class="form-label">Ruang</label>
                            <select class="form-control" id="id_ruang" name="id_ruang" required>
                                <option value="">-- Pilih Ruang --</option>
                                @foreach ($ruang as $ruang)
                                    <option value="{{ $ruang->id_ruang }}" {{ $jadwal_akademik->id_ruang == $ruang->id_ruang ? 'selected' : '' }}>
                                        {{ $ruang->nama_ruang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_Gol" class="form-label">Golongan</label>
                            <select class="form-control" id="id_Gol" name="id_Gol" required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $golongan)
                                    <option value="{{ $golongan->id_Gol }}" {{ $jadwal_akademik->id_Gol == $golongan->id_Gol ? 'selected' : '' }}>
                                        {{ $golongan->nama_Gol }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jadwal_akademik.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
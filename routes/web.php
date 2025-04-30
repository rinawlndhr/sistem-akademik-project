<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JadwalAkademikController;
use App\Http\Controllers\PresensiAkademikController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\PengampuController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Mahasiswa Routes
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('mahasiswa/pdf', [MahasiswaController::class, 'generatePDF'])->name('mahasiswa.pdf');

// Dosen Routes
Route::get('dosen/pdf', [DosenController::class, 'generatePDF'])->name('dosen.pdf');
Route::resource('dosen', DosenController::class);

// Matakuliah Routes
Route::get('matakuliah/pdf', [MatakuliahController::class, 'generatePDF'])->name('matakuliah.pdf');
Route::resource('matakuliah', MatakuliahController::class);

// Golongan Routes
Route::resource('golongan', GolonganController::class);

// Ruang Routes
Route::resource('ruang', RuangController::class);

// Jadwal Akademik Routes
Route::get('jadwal_akademik/pdf', [JadwalAkademikController::class, 'generatePDF'])->name('jadwal_akademik.pdf');
Route::resource('jadwal_akademik', JadwalAkademikController::class);

// Presensi Akademik Routes
Route::get('presensi_akademik/pdf', [PresensiAkademikController::class, 'generatePDF'])->name('presensi_akademik.pdf');
Route::resource('presensi_akademik', PresensiAkademikController::class);

// Route lain yang sudah ada
Route::resource('presensi_akademik', PresensiAkademikController::class);

// Tambahkan route khusus untuk PDF
Route::get('presensi-akademik-pdf', [App\Http\Controllers\PresensiAkademikController::class, 'generatePDF'])->name('presensi_akademik.generatePDF');

// KRS Routes
Route::get('krs/pdf', [KrsController::class, 'generatePDF'])->name('krs.pdf');
Route::get('krs/{id}/edit', [KrsController::class, 'edit'])->name('edit');
Route::put('krs/{id}', [KrsController::class, 'update'])->name('update');
Route::resource('krs', KrsController::class);


// Pengampu Routes
Route::get('pengampu/pdf', [PengampuController::class, 'generatePDF'])->name('pengampu.pdf');
Route::resource('pengampu', PengampuController::class);
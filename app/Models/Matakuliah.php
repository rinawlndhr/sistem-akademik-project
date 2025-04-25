<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    protected $primaryKey = 'Kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['Kode_mk', 'Nama_mk', 'sks', 'semester'];

    public function presensiAkademik()
    {
        return $this->hasMany(PresensiAkademik::class, 'Kode_mk', 'Kode_mk');
    }

    public function jadwalAkademik()
    {
        return $this->hasMany(JadwalAkademik::class, 'Kode_mk', 'Kode_mk');
    }

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'Kode_mk', 'Kode_mk');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class, 'Kode_mk', 'Kode_mk');
    }
}
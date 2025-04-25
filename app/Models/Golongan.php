<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'golongan';

    protected $primaryKey = 'id_Gol';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['id_Gol', 'nama_Gol'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_Gol', 'id_Gol');
    }

    public function jadwalAkademik()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_Gol', 'id_Gol');
    }
}
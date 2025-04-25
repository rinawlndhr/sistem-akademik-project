<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';

    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['NIP', 'Nama', 'Alamat', 'Nohp'];

    public function pengampus()
    {
        return $this->hasMany(Pengampu::class, 'NIP', 'NIP');
    }
}
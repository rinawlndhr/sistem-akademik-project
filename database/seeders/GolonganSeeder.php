<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Golongan;

class GolonganSeeder extends Seeder
{
    public function run()
    {
        $golongan = [
            ['id_Gol' => 'A1', 'nama_Gol' => 'Reguler Pagi'],
            ['id_Gol' => 'A2', 'nama_Gol' => 'Reguler Sore'],
            ['id_Gol' => 'B1', 'nama_Gol' => 'Kelas Karyawan'],
        ];

        foreach ($golongan as $golongan) {
            Golongan::create($golongan);
        }
    }
}
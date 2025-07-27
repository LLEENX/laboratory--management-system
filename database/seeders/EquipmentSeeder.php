<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('equipments')->insert([
            'nama' => 'Arduino Uno',
            'kode' => 'ARDUINO-001',
            'jumlah' => 10,
            'lokasi' => 'Lab F505',
            'status' => 'tersedia',
        ]);
    }
}

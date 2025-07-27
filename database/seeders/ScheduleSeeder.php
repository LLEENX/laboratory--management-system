<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            'user_id' => 3, // ID dosen yang membuat jadwal
            'mata_kuliah' => 'Praktikum Pemrograman Web Lanjut',
            'kelas' => '6F',
            'tanggal' => '2025-07-30',
            'waktu_mulai' => '09:00:00',
            'waktu_selesai' => '10:45:00',
            'ruangan' => 'F508',
        ]);
    }
}

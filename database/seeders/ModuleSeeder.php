<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            'user_id' => 3, // ID Dosen yang mengupload modul
            'judul' => 'Modul 7 - FUNCTIONAL PROGRAMMING',
            'deskripsi' => 'Pengenalan dan implementasi functional programming dalam JavaScript.',
            'file_path' => 'Praktikum Web Lanjut.pdf',
        ]);
    }
}

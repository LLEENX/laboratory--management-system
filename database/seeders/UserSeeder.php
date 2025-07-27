<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail',
            'password' => Hash::make('@dm1n'),
            'nomor_induk' => null,
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Rifal Ariya Yusuftrian',
            'email' => '123@gmail.com',
            'password' => Hash::make('rifal123'),
            'nomor_induk' => '22533702',
            'role' => 'Mahasiswa',
        ]);

        User::create([
            'name' => 'Dyah Mustikasari',
            'email' => '456@gmail.com',
            'password' => Hash::make('dosen1'),
            'nomor_induk' => '0707108707',
            'role' => 'Dosen',
        ]);
    }
}

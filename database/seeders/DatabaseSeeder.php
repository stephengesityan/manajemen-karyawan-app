<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Karyawan::create([
            'nama' => 'Stephen Gesityan',
            'alamat' => 'Banyuwangi - Jawa Timur',
            'tanggal_lahir' => '1990-01-15',
            'jabatan' => 'Karyawan',
            'gaji' => '1000000',
            'status' => 'magang',
            'mulai_kerja' => '2024-06-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

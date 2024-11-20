<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LecturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lecturers')->insert([
            [
                'name' => 'Dr. Andi Wijaya',
                'email' => 'andi.wijaya@univ.ac.id',
                'phone' => '081234567890',
                'department' => 'Teknik Informatika',
            ],
            [
                'name' => 'Prof. Budi Santoso',
                'email' => 'budi.santoso@univ.ac.id',
                'phone' => '081298765432',
                'department' => 'Sistem Informasi',
            ],
            [
                'name' => 'Dr. Citra Lestari',
                'email' => 'citra.lestari@univ.ac.id',
                'phone' => '081245678912',
                'department' => 'Teknik Komputer',
            ],
        ]);
    }
}

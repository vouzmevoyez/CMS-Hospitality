<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'code' => 'CS101',
                'name' => 'Pemrograman Dasar',
                'description' => 'Belajar dasar-dasar pemrograman.',
                'class' => 'A',
            ],
            [
                'code' => 'CS102',
                'name' => 'Basis Data',
                'description' => 'Pengantar konsep dan manajemen basis data.',
                'class' => 'A',
            ],
            [
                'code' => 'CS103',
                'name' => 'Algoritma dan Struktur Data',
                'description' => 'Pemahaman algoritma dan struktur data.',
                'class' => 'A',
            ],
        ]);
    }
}

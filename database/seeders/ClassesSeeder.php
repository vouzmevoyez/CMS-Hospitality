<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassesSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar nama dari A sampai E
        $names = ['A', 'B', 'C', 'D', 'E', 'X'];

        // Menambahkan nama-nama tersebut ke dalam tabel classes
        foreach ($names as $name) {
            DB::table('classes')->insert([
                'name' => $name,
            ]);
        }
    }
}

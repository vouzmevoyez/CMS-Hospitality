<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Pastikan tabel lecturers dan courses memiliki data terlebih dahulu
                $lecturers = Lecturer::all();
                $courses = Course::all();

                if ($lecturers->isEmpty() || $courses->isEmpty()) {
                    $this->command->error('Lecturers and Courses tables must have data before seeding Materials.');
                    return;
                }

                // Loop untuk membuat materi
                foreach (range(1, 10) as $index) {
                    Material::create([
                        'url' => 'https://example.com/material-' . $index,
                        'lecturer_id' => $lecturers->random()->id, // Assign random lecturer
                        'course_id' => $courses->random()->id,    // Assign random course
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
    }
}

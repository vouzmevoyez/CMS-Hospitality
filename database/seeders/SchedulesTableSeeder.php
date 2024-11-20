<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
                'course_id' => 1, // ID dari tabel courses
                'lecturer_id' => 1, // ID dari tabel lecturers
                'day' => 'Monday',
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'room' => 'A101',
            ],
            [
                'course_id' => 2,
                'lecturer_id' => 2,
                'day' => 'Wednesday',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'room' => 'B201',
            ],
            [
                'course_id' => 3,
                'lecturer_id' => 3,
                'day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'room' => 'C301',
            ],
        ]);
    }
}

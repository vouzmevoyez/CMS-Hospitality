<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id(); // ID unik untuk jadwal
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Relasi ke courses
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade'); // Relasi ke lecturers
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade'); // Relasi ke status
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade'); // Relasi ke status
            $table->string('day'); // Hari jadwal (contoh: "Monday")
            $table->time('start_time'); // Waktu mulai
            $table->time('end_time'); // Waktu selesai
            $table->string('room'); // Ruangan atau tempat kuliah
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('file_path'); // Menyimpan path file yang diunggah
            $table->string('file_name'); // Menyimpan nama file yang diunggah
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade'); // Relasi ke tabel lecturers
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Relasi ke tabel courses
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade'); // Relasi ke tabel courses
            $table->boolean('is_uploaded')->default(false); // Status upload (true jika sudah diupload)
            $table->timestamps(); // Menyimpan informasi kapan materi dibuat/diupdate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};

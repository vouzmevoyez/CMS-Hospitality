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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // ID unik untuk course
            $table->string('code')->unique(); // Kode mata kuliah (misalnya: CS101)
            $table->string('name'); // Nama mata kuliah (misalnya: Pemrograman Dasar)
            $table->text('description')->nullable(); // Deskripsi mata kuliah
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

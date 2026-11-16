<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */public function up(): void
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();

        $table->foreignId('student_id')
              ->constrained('students')
              ->onDelete('cascade');

        $table->foreignId('professor_id')
              ->constrained('professors')
              ->onDelete('cascade');

        $table->foreignId('subject_id')
              ->constrained('subjects')
              ->onDelete('cascade');

        $table->string('title');
        $table->text('description')->nullable();
        $table->string('file_path')->nullable();

        $table->enum('status', [
            'pending',
            'approved',
            'rejected'
        ])->default('pending');

        $table->text('feedback')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

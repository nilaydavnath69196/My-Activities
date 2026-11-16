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
    Schema::create('attendances', function (Blueprint $table) {
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

        $table->integer('total_classes')->default(0);
        $table->integer('present')->default(0);
        $table->integer('absent')->default(0);
        $table->decimal('percentage', 5, 2)->default(0);

        $table->timestamps();

        $table->unique([
            'student_id',
            'subject_id'
        ]);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

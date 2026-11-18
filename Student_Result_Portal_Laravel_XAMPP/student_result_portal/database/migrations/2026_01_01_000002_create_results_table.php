<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('course_code');
            $table->decimal('marks', 5, 2);
            $table->string('grade', 2);
            $table->timestamps();
            $table->unique(['student_id', 'course_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};

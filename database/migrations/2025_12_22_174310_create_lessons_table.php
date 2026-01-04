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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('title');

            // 🔑 ключевое поле
            $table->enum('type', ['theory', 'interactive', 'quest'])
                  ->default('theory');

            // для theory / interactive
            $table->json('content')->nullable();

            $table->string('video_url')->nullable();
            $table->integer('order')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};

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
        Schema::create('teacher_classes', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Keys
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('class_id');

            // Relationships
            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('class_id')
                ->references('id')->on('class_names')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_classes');
    }
};

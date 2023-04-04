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
            $table->id();
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('added_by');
            $table->string('course');
            $table->string('course_code');
            $table->timestamp('start_time')->default()->useCurrent();
            $table->timestamp('end_time')->default()->useCurrent();
            $table->boolean('canceled');
            $table->integer('day');
            $table->string('venue');
            $table->string('lecture');
            $table->timestamps();
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

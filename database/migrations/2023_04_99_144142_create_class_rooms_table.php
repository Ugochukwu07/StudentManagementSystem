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
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedInteger('added_by');
            $table->timestamps();
        });

        Schema::table('profiles', function(Blueprint $table){
            $table->unsignedBigInteger('class_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_rooms');

        Schema::table('profiles', function(Blueprint $table){
            $table->dropColumn(['class_id']);//->default(1);
        });
    }
};

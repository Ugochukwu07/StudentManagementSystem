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
        Schema::table('schedules', function(Blueprint $table){
            $table->string('start_time')->default('8:10')->change();
            $table->string('end_time')->default('8:10')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function(Blueprint $table){
            $table->timestamp('start_time')->default()->useCurrent()->change();
            $table->timestamp('end_time')->default()->useCurrent()->change();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('active');
            // $table->foreign('faculty_id')->references('id')->on('faculty')->onDelete('cascade');
            // $table->foreign('added_by')->references('id')->on('admin')->onDelete('cascade');
            $table->boolean('approved');
            $table->unsignedInteger('approved_by'); 
            $table->string('added_by_role'); 
            $table->unsignedInteger('added_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};

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
            $table->id('course_id');
            $table->string('course_name');
            $table->string('course_about', 500);
            $table->string('course_thumb');
            $table->integer('kelas_id');
            $table->timestamps();
        });
        
        Schema::create('course_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
        });

        Schema::create('course_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
            $table->integer('star');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_entries');
        Schema::dropIfExists('course_rates');
    }
};

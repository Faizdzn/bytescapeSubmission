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
        Schema::create('course', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name');
            $table->string('course_desc');
            $table->string('course_topic')->nullable();
            $table->integer('course_slot');
            $table->integer('course_author');
            $table->bigInteger('course_time');
            $table->timestamps();
        });

        Schema::create('course_entry', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
        Schema::dropIfExists('course_entry');
    }
};

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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->string('kelas_name');
            $table->timestamps();
        });

        Schema::create('kelas_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kelas_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('kelas_entries');
    }
};

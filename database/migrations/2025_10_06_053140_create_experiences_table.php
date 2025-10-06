<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->unique();
            $table->string('name', 32)->unique();
            $table->json('job_desk');
            $table->enum('category', ['internship', 'employee', 'freelance']);
            $table->year('year_start');
            $table->year('year_end');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->unique();
            $table->string('name', 64)->unique();
            $table->string('description', 120);
            $table->string('file')->unique();
            $table->enum('file_type', ['pdf', 'png', 'jpg', 'jpeg']);
            $table->enum('file_orientation', ['portrait', 'landscape']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};

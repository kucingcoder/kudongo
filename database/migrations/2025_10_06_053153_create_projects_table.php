<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->unique();
            $table->string('name', 64)->unique();
            $table->string('short_description', 100);
            $table->text('full_description');
            $table->string('url')->nullable();
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('cascade');
            $table->enum('category', ['school task', 'course project', 'competition', 'college project', 'internship', 'research', 'collaboration', 'volunteer', 'opensource', 'freelance', 'job duties', 'other']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

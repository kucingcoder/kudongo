<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('web_visitors', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->date('date');
            $table->timestamps();
            $table->unique(['ip', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('web_visitors');
    }
};

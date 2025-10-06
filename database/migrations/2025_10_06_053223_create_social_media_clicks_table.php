<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_media_clicks', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->date('date');
            $table->foreignId('id_social_media')->constrained('social_medias')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['ip', 'date', 'id_social_media']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_media_clicks');
    }
};

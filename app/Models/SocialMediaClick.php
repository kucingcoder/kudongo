<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMediaClick extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'date',
        'id_social_media',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function socialMedia(): BelongsTo
    {
        return $this->belongsTo(SocialMedia::class, 'id_social_media');
    }
}

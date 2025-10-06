<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'url',
    ];

    public function socialMediaClicks(): HasMany
    {
        return $this->hasMany(SocialMediaClick::class, 'id_social_media');
    }
}

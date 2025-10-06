<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkillCategory extends Model
{
    use HasFactory;

    protected $table = 'skill_categories';

    protected $fillable = [
        'name',
    ];

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'id_skill_category');
    }
}

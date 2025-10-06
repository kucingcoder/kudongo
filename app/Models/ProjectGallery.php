<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'id_project',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}

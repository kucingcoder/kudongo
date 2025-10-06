<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'job_desk',
        'category',
        'year_start',
        'year_end',
    ];

    protected function casts(): array
    {
        return [
            'job_desk' => 'array',
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiseaseReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'year',
        'canton',
        'diseases_group',
        'diseases',
        'species',
        'count',
        'api_hash',
        'notes',
    ];

    protected $casts = [
        'year' => 'integer',
        'count' => 'integer',
    ];
}

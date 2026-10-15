<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'pet_name', 'pet_type', 'breed', 'color', 'status',
        'description', 'location', 'last_seen_at', 'photo_path',
        'contact_name', 'contact_phone',
    ];

    protected $casts = ['last_seen_at' => 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

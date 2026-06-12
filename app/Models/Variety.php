<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variety extends Model
{
    protected $fillable = [
        'name',
        'khmer_name',
        'type',
        'location',
        'description',
        'yield',
        'cycle',
        'season',
        'demand',
        'image',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

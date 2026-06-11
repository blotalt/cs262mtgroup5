<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketPrice extends Model
{
    protected $fillable = [
        'rice_variety',
        'rice_type',
        'province',
        'market',
        'price_per_kg',
        'change_percent',
    ];
}
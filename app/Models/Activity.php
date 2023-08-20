<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'shelf',
    ];

    protected static function booted(): void
    {
        static::saving(function (Activity $activity) {
            $activity->user_id = Auth::id();
        });
    }
}
